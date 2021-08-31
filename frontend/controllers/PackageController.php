<?php

namespace frontend\controllers;
use Yii;
use Yii\helpers\ArrayHelper;
use frontend\models\Package;
use frontend\models\ItemSearch;
use frontend\models\PackageItem;
use frontend\models\PackageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PackageController implements the CRUD actions for Package model.
 */
class PackageController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Package models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Package model.
     * @param int $package_id Package ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($package_id)
    {
        $searchModel = new ItemSearch();
        $item_id = ArrayHelper::map(PackageItem::find()->where(['package_id'=>$package_id])->all(),'item_id','item_id');
        $searchModel->item_id = $item_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->renderAjax('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($package_id)
        ]);
    }

    /**
     * Creates a new Package model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Package();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->upload('image');
                $flage = 1;
                $transaction = Yii::$app->db->beginTransaction();
                try{
                  if($model->save()){
                    $package_items = [];
            				foreach ($model->package_item as $item) {
            						$package_items[] = [
            								$model->package_id,
            								$item
            						];
            				}
            				$batch_insert = Yii::$app->db->createCommand()->batchInsert('package_item', ['package_id', 'item_id'], $package_items)->execute();
                    if($batch_insert){
                      $transaction->commit();
                      Yii::$app->session->setflash('New Package Added Successfully.');
                    }else {
                      $transaction->rollBack();
                      Yii::$app->session->setflash('New Package Added Failed.');
                    }
                  }else {
                    var_dump($model->errors);die;
                    $transaction->rollBack();
                    Yii::$app->session->setflash('New Package Added Failed.');
                  }
                }catch(Exception $e){
                  $transaction->rollBack();
                }
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Package model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $package_id Package ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($package_id)
    {
        $model = $this->findModel($package_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'package_id' => $model->package_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Package model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $package_id Package ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($package_id)
    {
        $this->findModel($package_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Package model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $package_id Package ID
     * @return Package the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($package_id)
    {
        if (($model = Package::findOne($package_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
