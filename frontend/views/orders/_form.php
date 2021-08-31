<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
  $status = [0=>'Pending',1=>'Confirmed','2'=>'Canceled'];
/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(['id'=>'order']); ?>
    <!-- <?//= $form->field($model, 'order_date')->textInput() ?> -->
    <?= $form->field($model, 'order_date')->widget(
            DatePicker::className(), [
                // inline too, not bad
                 // 'inline' => true,
                 // modify template for custom rendering
                // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-dd'
                ]
        ]);?>

    <?= $form->field($model, 'order_status')->dropdownlist($status,['prompt'=>'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
