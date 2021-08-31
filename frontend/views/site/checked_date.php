<?php
  use dosamigos\datepicker\DatePicker;
  use yii\helpers\Url;
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  $load_url = Url::to(['/site/checked-order', 'id'=>$id]);
  $today = date('Y-m-d');
 ?>
 <?php $form = ActiveForm::begin(); ?>
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
])->label('Select Order Date');?>
  <div id='alerts' class="text-danger"></div>
 <div class="form-group text-center sub">
     <?= Html::submitButton('Order Now', ['class' => 'btn btn-warning']) ?>
 </div>

 <?php ActiveForm::end(); ?>
 <style>
  .sub{
    display:none;
  }
 </style>
<?php
$this->registerJs(<<<JS
  $("#orders-order_date").change(function(){
    $.post("$load_url"+"&date="+$(this).val(), function( data ) {
      if(data == '1'){
        console.log('yes');
        $("#alerts").html('Sorry, You are late to order. This order date is already arranged.');
        $(".sub").slideUp();
      }else{
        $("#alerts").html('');
        $(".sub").slideDown();
      }
      // $( ".result" ).html( data );
    });
  })

JS
);
