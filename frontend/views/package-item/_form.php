<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PackageItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'package_id')->textInput() ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
