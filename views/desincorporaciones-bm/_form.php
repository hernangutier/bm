<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesBm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desincorporaciones-bm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ncontrol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <?= $form->field($model, 'fecha_trans')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'periodo')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paso')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

  

    <?php ActiveForm::end(); ?>

</div>
