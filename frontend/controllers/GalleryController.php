<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Gallery;
use frontend\models\GallerySearh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearh();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
     * @param int $gallery_id Gallery ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($gallery_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($gallery_id),
        ]);
    }

    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gallery();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
              $model->upload('image');
              if($model->save()){
                Yii::$app->session->setflash('New Gallery Added Successfully.');
              }else {
                Yii::$app->session->setflash('New Gallery Added Failed.');
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
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $gallery_id Gallery ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($gallery_id)
    {
        $model = $this->findModel($gallery_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'gallery_id' => $model->gallery_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $gallery_id Gallery ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($gallery_id)
    {
        $this->findModel($gallery_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $gallery_id Gallery ID
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($gallery_id)
    {
        if (($model = Gallery::findOne($gallery_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
