<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesBmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desincorporaciones-bm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'ncontrol') ?>

    <?= $form->field($model, 'concepto') ?>

    <?= $form->field($model, 'fecha_trans') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'periodo') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'paso') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'nacta') ?>

    <?php // echo $form->field($model, 'fecha_acta') ?>

    <?php // echo $form->field($model, 'codben') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
