<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PackageItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Package Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Package Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'package_item_id',
            'package_id',
            'item_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
