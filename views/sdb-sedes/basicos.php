<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sdb-sedes-form">

   

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tipo')->textInput() ?>


    

   

</div>
