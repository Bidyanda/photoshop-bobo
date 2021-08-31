<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use frontend\models\Category;
/* @var $this yii\web\View */
/* @var $model frontend\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
$category = ArrayHelper::map(Category::find()->all(),'category_id','category_name');


$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Add New Gallery Item', ['create'], ['class' => 'btn btn-success openModal','size'=>'md','header'=>'Add New Gallery Item']) ?>
    </p><br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
      <div class="panel panel-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'gallery_id',
                'title',
                [
                  'attribute'=>'category_id',
                  'value'=> function($model)use($category){
                    return $category[$model->category_id];
                  },
                  'filter'=>$category,
                  'label' => 'Category'
                ],
                // 'category_id',
                [
                    'value' => function($model) {
                        return '<img src="/'.$model->image.'" class="cat-img">';
                    },
                    'format' => 'raw'
                ],
                // 'image',
                'description',

                ['class' => 'yii\grid\ActionColumn',
                  'template' => "{delete}",
                  'buttons' => [
                    'delete' => function($url,$model){
                      return Html::a("<i class='fa fa-trash text-danger'></i>",['delete','gallery_id'=>$model->gallery_id],['data-confirm'=>'Are you sure to delete?','data-method'=>'post']);
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
