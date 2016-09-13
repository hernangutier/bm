<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use \kartik\switchinput\SwitchInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-adicionales">








    <?= $form->field($model, 'responsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tlfcontact')->widget(\yii\widgets\MaskedInput::className(), [
    	'mask' => '9999-999-9999',
	]) ?>


  <?= $form->field($model,'fecha_rnc_vence')->widget(DatePicker::classname(), [
  'options' => ['placeholder' => 'Ingrese Fecha de Desincorporación ...'],
  'pluginOptions' => [
      'autoclose'=>true,
      'format'=>'yyyy-mm-dd',
  ]
  ])
  ?>

  <?= $form->field($model,'fecha_rif_vence')->widget(DatePicker::classname(), [
  'options' => ['placeholder' => 'Ingrese Fecha de Desincorporación ...'],
  'pluginOptions' => [
      'autoclose'=>true,
      'format'=>'yyyy-mm-dd',
  ]
  ])
  ?>




    <?= $form->field($model, 'observacion')->textarea(['maxlength' => true]) ?>


    <?php
        if (!($model->isNewRecord)) {
          echo  $form->field($model, 'activo')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);
        }
    ?>








</div>
