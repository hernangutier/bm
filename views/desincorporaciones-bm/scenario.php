<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesBm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desincorporaciones-bm-form">



    <?= $form->field($model, 'nacta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codben')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>





  

</div>
