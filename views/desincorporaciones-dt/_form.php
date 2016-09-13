<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesDt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desincorporaciones-dt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coddes')->textInput() ?>

    <?= $form->field($model, 'codbien')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
