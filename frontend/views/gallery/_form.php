<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Category;
/* @var $this yii\web\View */
/* @var $model frontend\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
$category = ArrayHelper::map(Category::find()->all(),'category_id','category_name');
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['id'=>'gallery']); ?>

    <?= $form->field($model, 'category_id')->dropdownlist($category,['prompt'=>'--Select Category--'])->label('Category') ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'image')->fileInput()->label($model->getAttributeLabel('image')) ?>
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
  $("#gallery-image").change(function() {
      readURL(this, $("#photo"));
  });
JS
);
