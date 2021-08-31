<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Add New Category', ['create'], ['class' => 'btn btn-success openModal','size'=>'md','header'=>'Add New Category']) ?>
    </p><BR>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
      <div class="panel panel-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'category_image',
                // 'category_id',
                'category_name',
                [
                    'value' => function($model) {
                        return '<img src="/'.$model->category_image.'" class="cat-img">';
                    },
                    'format' => 'raw'
                ],
                ['class' => 'yii\grid\ActionColumn',
                  'template' => "{delete}",
                  'buttons' => [
                    'delete' => function($url,$model){
                      return Html::a('<i class="fa fa-trash text-danger"></i>',['delete','category_id'=>$model->category_id],['data-confirm'=>'Are you sure to delete','data-method'=>'post']);
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
