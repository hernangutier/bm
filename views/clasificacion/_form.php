<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion */
/* @var $form yii\widgets\ActiveForm */
?>



<div class='container '>




    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grupo')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '99',
    ]) ?>

    <?= $form->field($model, 'subgrupo')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '99',
    ]) ?>

    <?= $form->field($model, 'seccion')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '99',
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
