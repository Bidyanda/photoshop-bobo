<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Customer;
use frontend\models\Gallery;
use common\models\User;
use frontend\models\PackageDetails;
use frontend\models\Package;
use frontend\models\Orders;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionTest() {
        $data = '';
        $back = '';
        $full = '';
        if($json = Yii::$app->request->post('json')) {
            $x = json_decode($json);
            $data = $x->card_front;
            $back = $x->card_back;
            // $full = $x->full;
        }

        return $this->render('test', [
            'data' => $data,
            'back' => $back,
            'full' => $full
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'main-customer';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->identity->username != 'admin'){
              return $this->redirect(['cindex']);
            }
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        // return $this->goHome();
        return $this->redirect('cindex');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = 'main-customer';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
          $flag = 1;
            $transaction = Yii::$app->db->beginTransaction();
            try{
                $user = new User();
                $user->username = $model->username;
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->generateAuthKey();
                $user->status = 10;
                $user->generateEmailVerificationToken();
                if($user->save()){
                  $customer = new Customer();
                  $customer->name = $model->name;
                  $customer->address = $model->address;
                  $customer->phone_no = $model->phoneno;
                  $customer->district = $model->district;
                  $customer->pincode = $model->pincode;
                  $customer->user_id = $user->id;
                  $customer->email = $model->email;
                  if(!$customer->save())
                    $flag = 0;
                }

                if($flag){
                  $transaction->commit();
                  Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                }else {
                  $transaction->rollBack();
                  Yii::$app->session->setFlash('danger', 'Registration failed.');
                }
            }catch(Exception $e){
              $transaction->rollBack();
            }
            return $this->redirect(['cindex']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    //customer part

    public function actionCindex()
    {
      $this->layout = 'main-customer';
      return $this->render('ctest');
    }

    public function actionContactus()
    {
      $this->layout = 'main-customer';
      return $this->render('contact_me');
    }
    public function actionAboutme()
    {
      $this->layout = 'main-customer';
      return $this->render('about_us');
    }
    public function actionGallery()
    {
      $this->layout = 'main-customer';
      $gallery = Gallery::find()->orderby('id desc')->all();
      return $this->render('gallery',['gallery'=>$gallery]);
    }

    public function actionPackage($id=null)
    {
      $this->layout = 'main-customer';
      $package = Package::find()->andFilterWhere(['package_id'=>$id])->all();
      // $packageDetails = PackageDetails::find()->andFilterWhere(['package_id'=>$id])->all();
      return $this->render('package',['package'=>$package]);
    }
    public function actionCheckedDate($id)
    {
      $model = new Orders();
      $price = Package::find()->where(['package_id'=>$id])->one()->price;
      $customer_id = Customer::find()->where(['user_id'=>Yii::$app->user->identity->id])->one()->customer_id;
      $model->package_id = $id;
      if ($model->load($this->request->post())) {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['signup']);
        }
        $model->customer_id = $customer_id;
        $model->price = $price;
        if($model->save()){
          Yii::$app->session->setFlash('success', 'Your order is successfully created. Please wait for confirmation of Admin.');
          return $this->redirect(Yii::$app->request->referrer);
        }else {
          var_dump($model->errors);die;
          Yii::$app->session->setFlash('success', 'Your order is created failed.');
        }
      }
      return $this->renderAjax('checked_date',['model' =>$model,'id'=>$id]);
    }
    public function actionCheckedOrder($id,$date)
    {
      $order = Orders::find()->where(['package_id'=>$id])->andWhere(['order_date'=>$date])->one();
      return $order?1:2;
    }
    public function actionOrderList()
    {
      $this->layout = 'main-customer';
      $customer_id = Customer::find()->where(['user_id'=>Yii::$app->user->identity->id])->one()->customer_id;
      $order =  Orders::find()->asArray()->select('package.*,order.*')->leftjoin('package','package.package_id=order.package_id')->where(['customer_id'=>$customer_id])->all();
      return $this->render('order_list',['order'=>$order]);
    }

    public function actionOrderCancel($id)
    {
      Order::UpdateAll(['order_status'=>2],['order_id'=>$id]);
      return $this->redirect(Yii::$app->request->referrer);
    }
}
