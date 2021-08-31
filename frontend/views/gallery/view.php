<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Gallery */

$this->title = $model->gallery_id;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'gallery_id' => $model->gallery_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'gallery_id' => $model->gallery_id], [
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
            'gallery_id',
            'image',
            'category_id',
            'description',
        ],
    ]) ?>

</div>
