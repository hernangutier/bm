<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedes */
/* @var $form yii\widgets\ActiveForm */

//--------- Ubicacion de la sedes segun datos de SUDEBIP ---
?>

<div class="sdb-sedes-form">

    

    

    <?= $form->field($model, 'localizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urbanizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle_av')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'casa_edif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piso')->textInput(['maxlength' => true]) ?>

</div>
