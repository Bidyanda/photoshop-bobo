<?php

namespace frontend\controllers;
use Yii;
use frontend\models\PackageItem;
use frontend\models\PackageItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PackageItemController implements the CRUD actions for PackageItem model.
 */
class PackageItemController extends Controller
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
     * Lists all PackageItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackageItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PackageItem model.
     * @param int $package_item_id Package Item ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($package_item_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($package_item_id),
        ]);
    }

    /**
     * Creates a new PackageItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PackageItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'package_item_id' => $model->package_item_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PackageItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $package_item_id Package Item ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($package_item_id)
    {
        $model = $this->findModel($package_item_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'package_item_id' => $model->package_item_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PackageItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $package_item_id Package Item ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($package_item_id)
    {
        $this->findModel($package_item_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PackageItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $package_item_id Package Item ID
     * @return PackageItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($package_item_id)
    {
        if (($model = PackageItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
