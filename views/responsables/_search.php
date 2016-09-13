<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResponsablesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cedrif') ?>

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'telefono') ?>

    <?= $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'cargo') ?>

    <?php // echo $form->field($model, 'fregistro') ?>

    <?php // echo $form->field($model, 'personal') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'codunidad') ?>

    <?php // echo $form->field($model, 'cod') ?>

    <?php // echo $form->field($model, 'apellidos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
