<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Sign Up</h3>
			 			</div>
			 			<div class="panel-body text-left">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'address')->textInput() ?>
                <?= $form->field($model, 'phoneno')->textInput() ?>
                <?= $form->field($model, 'district')->textInput() ?>
                <?= $form->field($model, 'pincode')->textInput() ?>
                <?= $form->field($model, 'username')->textInput() ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'passwordConfirm')->passwordInput() ?>
                <div class="form-group" align='center'>
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
          </div>
    		</div>
  		</div>
  	</div>
  </div>
