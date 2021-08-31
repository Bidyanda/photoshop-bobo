<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Add New Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p><br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
      <div class="panel panel-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'customer_id',
                'name',
                'address',
                'phone_no',
                'email:email',
                'district',
                'pincode',
                //'created_date',
                //'user_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
      </div>
    </div>
</div>
