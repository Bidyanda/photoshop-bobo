<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PackageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'package_id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'package_name') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'no_of_camera_man') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
