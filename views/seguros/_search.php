<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SegurosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seguros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'codaseguradora') ?>

    <?= $form->field($model, 'otra_aseguradora') ?>

    <?= $form->field($model, 'npoliza') ?>

    <?= $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'moneda') ?>

    <?php // echo $form->field($model, 'especifique_moneda') ?>

    <?php // echo $form->field($model, 'f_ini') ?>

    <?php // echo $form->field($model, 'f_fin') ?>

    <?php // echo $form->field($model, 'resp_civil') ?>

    <?php // echo $form->field($model, 'tipo_cobertura') ?>

    <?php // echo $form->field($model, 'especifique_tipo_cobertura') ?>

    <?php // echo $form->field($model, 'descripcion_cobertura') ?>

    <?php // echo $form->field($model, 'codbien') ?>

    <?php // echo $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
