<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'category_image')->fileInput()->label($model->getAttributeLabel('category_image')) ?>
      </div>
      <div class="col-md-6">
        <img src="" id="photo" class="img-responsive img-thumbnail">
      </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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
  $("#category-category_image").change(function() {
      readURL(this, $("#photo"));
  });
JS
);
