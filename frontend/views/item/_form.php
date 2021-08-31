<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'item_brand')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <?= $form->field($model, 'lens_type')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-3">
        <?= $form->field($model, 'item_image')->fileInput()->label($model->getAttributeLabel('item_image')) ?>
        <!-- <?//= $form->field($model, 'item_image')->textInput(['maxlength' => true]) ?> -->
      </div>
      <div class="col-md-4">
        <img src="" id="photo" class="img-responsive img-thumbnail">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'model_no')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'description')->textarea(['maxlength' => true,'rows'=>3]) ?>
      </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs(<<<JS
  function readURL(input, elem) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        elem.attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#item-item_image").change(function() {
      readURL(this, $("#photo"));
  });
JS
);
