<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;


/* @var $this yii\web\View */
/* @var $model app\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-form">





    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>

    <?php //-------------- Lineas -------------

       echo $form->field($model, 'codlin')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(app\models\Lineas::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Sede ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>

    <?php //-------------- Lineas -------------

       echo $form->field($model, 'codclas')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(app\models\Clasificacion::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return  $model->grupo . '-'. $model->subgrupo . '-'.$model->seccion . '  ' . $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione la Clasificacion ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>


    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($model, 'costo')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        //'prefix' => '$ ',

        //'suffix' => ' BsF.',
        'allowNegative' => false
    ]
    ]);
    ?>


</div>
