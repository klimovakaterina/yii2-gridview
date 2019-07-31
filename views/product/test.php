<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 
$form = ActiveForm::begin([
 'id' => 'test-form',
 'action' => '/site/login',
 'options' => [
 'class' => 'form-inline',
 'enctype' => 'multipart/form-data'
 ]
]); ?>
  <?= $form->field($model, 'username', ['enableLabel' => false])->textInput(array('placeholder' => 'Ваше имя', 'class'=>'form-control text-center')); ?>
  
  <?php ActiveForm::end(); ?>