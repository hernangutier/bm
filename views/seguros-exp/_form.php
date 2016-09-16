<?php



use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
//use dosamigos\datepicker\DatePicker;
use kartik\widgets\TouchSpin;
use kartik\money\MaskMoney;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\widgets\SwitchInput;


/* @var $this yii\web\View */
/* @var $model app\models\SegurosExp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">



      <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

      <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

      <?php
      echo $form->field($model, 'file')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*'],
          ]);


       ?>

         <?php ActiveForm::end(); ?>
</div>
