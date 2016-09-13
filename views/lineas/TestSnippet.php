<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\money\MaskMoney;


/* @var $this yii\web\View */
/* @var $model app\models\Modelo */
/* @var $url  yii\helpers\Url */

$this->title = 'Nombre del Formulario';
$this->params['breadcrumbs'][] = ['label' => 'Volver', 'url' => $url ];

$this->params['breadcrumbs'][] = $this->title;
?>


<div class="form-action">
    <?php $form = ActiveForm::begin(); ?>
    <!-- ************************************** -->
    <!-- ************************************** -->
    <!-- ********* Campos de Formulario ******* -->
    <!-- ************************************** -->
    <!-- ************************************** -->
    <?= $form->field($model, 'Campo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Campo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Campo')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        //'prefix' => '$ ',

        //'suffix' => ' BsF.',
        'allowNegative' => false
    ]
    ]);
    <?= $form->field($model, 'codlin')->widget(Select2::classname(), [

       'data' => ArrayHelper::map(app\models\modelo::find()->all(),'id',
                   function($model, $defaultValue) {
                      return $model->descripcion;
                  }
                 ),
                 'language' => 'es',
                 'options' => ['placeholder' => 'Seleccione Campo ...'],
                 'pluginOptions' => [
                 'allowClear' => true
                 ],

    ]);
    <?= $form->field($model, 'Campo')->textarea(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>
</div>
  <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>
