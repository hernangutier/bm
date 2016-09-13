<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Responsables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-form">



    <?= $form->field($model, 'cedrif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textarea(['maxlength' => true]) ?>





    <?= $form->field($model, 'telefono')->widget(\yii\widgets\MaskedInput::className(), [
    		'mask' => '(9999)-999-9999',

	]) ?>

  <?= $form->field($model, 'fax')->widget(\yii\widgets\MaskedInput::className(), [
      'mask' => '(9999)-999-9999',

]) ?>

    <?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
    		'name' => 'input-36',
    			'clientOptions' => [
        		'alias' =>  'email'
    			],
	]) ?>



</div>
