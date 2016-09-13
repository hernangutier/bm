<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bovinos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codbov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fnac')->textInput() ?>

    <?= $form->field($model, 'fcreacion')->textInput() ?>

    <?= $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codraza')->textInput() ?>

    <?= $form->field($model, 'codganaderia')->textInput() ?>

    <?= $form->field($model, 'codcat_actual')->textInput() ?>

    <?= $form->field($model, 'codcat_ingreso')->textInput() ?>

    <?= $form->field($model, 'codcat_futura')->textInput() ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codrebano')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'tipo_ingreso')->textInput() ?>

    <?= $form->field($model, 'fingreso')->textInput() ?>

    <?= $form->field($model, 'peso_nacer')->textInput() ?>

    <?= $form->field($model, 'codgrupo')->textInput() ?>

    <?= $form->field($model, 'status_fisiologico')->textInput() ?>

    <?= $form->field($model, 'programa_reproductivo')->textInput() ?>

    <?= $form->field($model, 'color')->textInput() ?>

    <?= $form->field($model, 'caracteristicas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isdescartable')->checkbox() ?>

    <?= $form->field($model, 'parto_observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codpalp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
