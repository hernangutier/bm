<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BeneficiarioDes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedrif')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => 'a-99999999-9',
    ]) ?>

    <?= $form->field($model, 'razon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->widget(\yii\widgets\MaskedInput::className(), [
    	'mask' => '9999-999-9999',
	]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
