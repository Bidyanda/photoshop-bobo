<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Item */

$this->title = $model->item_id;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'item_id' => $model->item_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'item_id' => $model->item_id], [
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
            'item_id',
            'item_name',
            'item_brand',
            'lens_type',
            'item_image',
            'model_no',
            'description',
        ],
    ]) ?>

</div>
