<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Package */

$this->title = 'Update Package: ' . $model->package_id;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->package_id, 'url' => ['view', 'package_id' => $model->package_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="package-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
