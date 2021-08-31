<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PackageItem */

$this->title = 'Update Package Item: ' . $model->package_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Package Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->package_item_id, 'url' => ['view', 'package_item_id' => $model->package_item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="package-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
