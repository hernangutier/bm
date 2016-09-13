<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-basicos">








    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedrif')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => 'a-99999999-9',
    ]) ?>

    <?= $form->field($model, 'razon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otra_descripcion')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'tipo_de_proveedor')->dropDownList(
                    ['0'=>'Nacional',
                    '1'=>'Internacional',

                    ]
                  )


    ?>






</div>
