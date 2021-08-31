<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use frontend\models\Category;
/* @var $this yii\web\View */
/* @var $model frontend\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
$category = ArrayHelper::map(Category::find()->all(),'category_id','category_name');
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Add New Package', ['create'], ['class' => 'btn btn-success openModal','size'=>'md','header'=>'Add New Package']) ?>
    </p><br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
      <div class="panel panel-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'package_id',
                // 'category_id',
                [
                  'attribute'=>'category_id',
                  'value'=> function($model)use($category){
                    return $category[$model->category_id];
                  },
                  'filter'=>$category,
                  'label' => 'Category'
                ],
                'package_name',
                'price',
                [
                    'value' => function($model) {
                        return '<img src="/'.$model->image.'" class="cat-img">';
                    },
                    'format' => 'raw'
                ],
                'description',
                // 'image',
                'no_of_camera_man',
                ['class' => 'yii\grid\ActionColumn',
                  'template' => "{view} {delete}",
                  'buttons' => [
                    'view' => function($url,$model){
                      return Html::a('<i class="fa fa-eye text-primary"></i>',['view','package_id'=>$model->package_id],['class'=>'openModal','size'=>'lg','header'=>'Package Item']);
                    },
                    'delete' => function($url,$model){
                      return Html::a('<i class="fa fa-trash text-danger"></i>',['delete','package_id'=>$model->package_id],['data-confirm'=>'Are you sure to delete?','data-method'=>'post']);
                    }
                  ]
                ],
            ],
        ]); ?>
      </div>
    </div>
</div>
<style>
.cat-img {
    max-height: 40px;
    transition: 0.3s;
}
.cat-img:hover {
    transform: scale(5);
    transition: 0.5s;
}
</style>
