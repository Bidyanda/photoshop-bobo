<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PackageItem */

$this->title = $model->package_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Package Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="package-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'package_item_id' => $model->package_item_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'package_item_id' => $model->package_item_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'package_item_id',
            'package_id',
            'item_id',
        ],
    ]) ?>

</div>
