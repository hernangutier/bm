<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $form yii\widgets\ActiveForm */
?>










  <?= $form->field($model, 'npoliza')->textInput(['maxlength' => true]) ?>

  <?php //-------------- Aseguradoras -------------

       echo $form->field($model, 'codaseguradora')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(app\models\SdbSeguros::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->codigo . ' ' . $model->razon;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione la Aseguradora ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>

  <?= $form->field($model, 'otra_aseguradora')->textInput(['maxlength' => true]) ?>


  <?= $form->field($model, 'moneda')->dropDownList(
                  ['1'=>'Bolívares',
                  '2'=>'Dólares',
                  '3'=>'Euros',
                  '4'=>'Otra Moneda',

                  ]
                )


  ?>

  <?= $form->field($model, 'especifique_moneda')->textInput(['maxlength' => true]) ?>


  <?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
      'pluginOptions' => [


          'allowNegative' => false
          ]
      ]); ?>
