<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MovimientosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimientos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'codund_origen') ?>

    <?= $form->field($model, 'codund_destino') ?>

    <?= $form->field($model, 'coduser_origen') ?>

    <?php // echo $form->field($model, 'coduser_destino') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'coduser') ?>

    <?php // echo $form->field($model, 'ncontrol') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'periodo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
