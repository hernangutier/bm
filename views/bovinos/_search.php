<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BovinosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bovinos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codbov') ?>

    <?= $form->field($model, 'fnac') ?>

    <?= $form->field($model, 'fcreacion') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'codraza') ?>

    <?php // echo $form->field($model, 'codganaderia') ?>

    <?php // echo $form->field($model, 'codcat_actual') ?>

    <?php // echo $form->field($model, 'codcat_ingreso') ?>

    <?php // echo $form->field($model, 'codcat_futura') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'codrebano') ?>

    <?php // echo $form->field($model, 'status')->checkbox() ?>

    <?php // echo $form->field($model, 'tipo_ingreso') ?>

    <?php // echo $form->field($model, 'fingreso') ?>

    <?php // echo $form->field($model, 'peso_nacer') ?>

    <?php // echo $form->field($model, 'cod') ?>

    <?php // echo $form->field($model, 'codgrupo') ?>

    <?php // echo $form->field($model, 'status_fisiologico') ?>

    <?php // echo $form->field($model, 'programa_reproductivo') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'caracteristicas') ?>

    <?php // echo $form->field($model, 'isdescartable')->checkbox() ?>

    <?php // echo $form->field($model, 'parto_observaciones') ?>

    <?php // echo $form->field($model, 'codpalp') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
