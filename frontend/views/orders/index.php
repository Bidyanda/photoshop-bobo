<?php

use yii\helpers\Html;
use yii\grid\GridView;
  $status = [0=>'Pending',1=>'Confirmed','2'=>'Canceled'];
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <p>
        <!-- <?//= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'order_id',
            // 'customer_id',
            [
              'attribute' => 'customer_id',
              'label' => 'Customer',
              'value' => function($model){
                $data = $model->customer;
                return $data->name;
              },
            ],
            [
              'attribute' => 'package_id',
              'label' => 'Package',
              'value' => function($model){
                $data = $model->package;
                return $data->package_name;
              },
            ],
            'order_date',
            'price',
            [
              'attribute' =>'order_status',
              'label'=> 'Status',
              'value' => function($model)use($status){
                return $status[$model->order_status];
              }
            ],
            // 'package_id',
            //'created_date',
            //'order_status:boolean',

            ['class' => 'yii\grid\ActionColumn',
              'template' => "{update}",
              'buttons' => [
                'update' => function($url,$model){
                  return Html::a("<i class='fa fa-pencil text-primary'></i>",['update','order_id'=>$model->order_id],['class'=>'openModal','size'=>'md','header'=>'']);
                }
              ]
            ],
        ],
    ]); ?>


</div>
