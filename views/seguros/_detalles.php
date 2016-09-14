<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use \kartik\switchinput\SwitchInput;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $form yii\widgets\ActiveForm */
?>







  <?= $form->field($model,'f_ini')->widget(DatePicker::classname(), [
  'options' => ['placeholder' => 'Ingrese Fecha de Inicio ...'],
  'pluginOptions' => [
      'autoclose'=>true,
      'format'=>'yyyy-mm-dd',
  ]
  ])
  ?>

  <?= $form->field($model,'f_fin')->widget(DatePicker::classname(), [
  'options' => ['placeholder' => 'Ingrese Fecha de Vencimiento ...'],
  'pluginOptions' => [
      'autoclose'=>true,
      'format'=>'yyyy-mm-dd',
  ]
  ])
  ?>


  <?= $form->field($model, 'tipo')->dropDownList(
                  ['I'=>'Individual',
                  'C'=>'Colectiva',

                  ]
                )


  ?>

  <?= $form->field($model, 'tipo_cobertura')->dropDownList(
                  ['1'=>'Total',
                  '2'=>'Parcial',
                  '3'=>'Otro tipo de cobertura',

                  ]
                )


  ?>

  <?= $form->field($model, 'especifique_tipo_cobertura')->textInput(['maxlength' => true]) ?>
