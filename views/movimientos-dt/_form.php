<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MovimientosDt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimientos-dt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codbien')->textInput() ?>

    <?= $form->field($model, 'codmov')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
