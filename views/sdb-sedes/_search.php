<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sdb-sedes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'localizacion') ?>

    <?= $form->field($model, 'codpais') ?>

    <?php // echo $form->field($model, 'otro_pais') ?>

    <?php // echo $form->field($model, 'codparro') ?>

    <?php // echo $form->field($model, 'codciudad') ?>

    <?php // echo $form->field($model, 'otra_ciudad') ?>

    <?php // echo $form->field($model, 'urbanizacion') ?>

    <?php // echo $form->field($model, 'calle_av') ?>

    <?php // echo $form->field($model, 'casa_edif') ?>

    <?php // echo $form->field($model, 'piso') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'codest') ?>

    <?php // echo $form->field($model, 'codmun') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
