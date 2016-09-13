<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BienesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'serial') ?>

    <?= $form->field($model, 'cod_ing') ?>

    <?= $form->field($model, 'dias_garantia') ?>

    <?php // echo $form->field($model, 'codresp_directo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <?php // echo $form->field($model, 'notasigned') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'isvehicle') ?>

    <?php // echo $form->field($model, 'codvehicle') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'cod_und_actual') ?>

    <?php // echo $form->field($model, 'isasigned') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'marca') ?>

    <?php // echo $form->field($model, 'codclas') ?>

    <?php // echo $form->field($model, 'fcreacion') ?>

    <?php // echo $form->field($model, 'coduser') ?>

    <?php // echo $form->field($model, 'operativo') ?>

    <?php // echo $form->field($model, 'tipobien') ?>

    <?php // echo $form->field($model, 'codlin') ?>

    <?php // echo $form->field($model, 'localizacion') ?>

    <?php // echo $form->field($model, 'fdesinc') ?>

    <?php // echo $form->field($model, 'pendientedesinc') ?>

    <?php // echo $form->field($model, 'undmedida') ?>

    <?php // echo $form->field($model, 'aplicaiva') ?>

    <?php // echo $form->field($model, 'existe') ?>

    <?php // echo $form->field($model, 'codcat') ?>

    <?php // echo $form->field($model, 'statusfisical') ?>

    <?php // echo $form->field($model, 'disponibilidad') ?>

    <?php // echo $form->field($model, 'foto1') ?>

    <?php // echo $form->field($model, 'mantenimiento') ?>

    <?php // echo $form->field($model, 'estado_uso') ?>

    <?php // echo $form->field($model, 'estado_fisico') ?>

    <?php // echo $form->field($model, 'old_cod') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'is_colectivo')->checkbox() ?>

    <?php // echo $form->field($model, 'motivo_indisponibilidad') ?>

    <?php // echo $form->field($model, 'is_in')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
