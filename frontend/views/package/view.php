<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Package */

$this->title = $model->package_id;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="package-view">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'item_name',
            'item_brand',
            [
                'value' => function($model) {
                    return '<img src="/'.$model->item_image.'" class="cat-img">';
                },
                'format' => 'raw'
            ],
            'lens_type',
            'model_no',
        ],
    ]); ?>

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
