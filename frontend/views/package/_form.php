<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Category;
use frontend\models\Item;
/* @var $this yii\web\View */
/* @var $model frontend\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
$category = ArrayHelper::map(Category::find()->all(),'category_id','category_name');
$items = Item::find()->select('item_id,item_name')->all();

/* @var $this yii\web\View */
/* @var $model frontend\models\Package */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-md-4">
        <?= $form->field($model, 'category_id')->dropdownlist($category,['prompt'=>'--Select Category--'])->label('Category') ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'package_name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <?= $form->field($model, 'no_of_camera_man')->textInput() ?>
      </div>
      <div class="col-md-3">
        <?= $form->field($model, 'image')->fileInput()->label($model->getAttributeLabel('image')) ?>
      </div>
      <div class="col-md-4">
        <img src="" id="photo" class="img-responsive img-thumbnail">
      </div>
    </div>
    <?= $form->field($model, 'description')->textarea(['row' => 4]) ?>
    <div class="panel panel-default">
      <div class="panel-heading">Add Item</div>
      <div class="panel panel-body">
        <table >
          <?php foreach($items as $item){ ?>
              <tr>
                <td>
                <label style="font-size:12px"><input type="checkbox" name="Package[package_item][]" value="<?= $item->item_id ?>"> <?= $item->item_name?></label>
                </td>
              </tr>
          <?php } ?>
        </table>
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
  $("#package-image").change(function() {
      readURL(this, $("#photo"));
  });
JS
);
