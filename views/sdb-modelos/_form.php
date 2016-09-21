<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\SdbModelos */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?php //-------------- Contactos -------------

      echo $form->field($model, 'cod_segun_cat')->widget(Select2::classname(), [

           'data' => ArrayHelper::map(app\models\SdbCategoriasEsp::find()->all(),'cod',
                function($model, $defaultValue) {
                   return $model->codsub0->codigo. '-'. $model->codigo.'     '.$model->descripcion;
           }
   ),
           'language' => 'es',

           'options' => ['placeholder' => 'Seleccione Categoria Especifica ...'],
           'pluginOptions' => [
           'allowClear' => true
           ],

           ]);

   ?>

   <div class="form-group">
       <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
   </div>

    <?php ActiveForm::end(); ?>

</div>
