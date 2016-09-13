<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
/* @var $url yii\helpers\Url */

$this->title = 'Ajustar a la Adecuación el Bien: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Bienes', 'url' => [$url]];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class='container'>

    <?php $form = ActiveForm::begin(); ?>




    <?php //-------------- Contactos -------------

      echo $form->field($model, 'codcat')->widget(Select2::classname(), [

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

   <?= $form->field($model, 'estado_uso')->dropDownList(
                   [
                    '1'=>'1 En Uso',
                    '2'=>'2 En Comodato',
                    '3'=>'3 En Arrendamiento',
                    '4'=>'4 En Mantenimiento',
                    '5'=>'5 En Reparación',
                    '6'=>'6 En proceso de disposición',
                    '7'=>'7 En Desuso por Obsolecencia',
                    '8'=>'8 En Desuso por Inservibilidad',
                    '9'=>'9 En Desuso por Obsolecencia e Inservibilidad',
                    '10'=>'10 En Almacen o Deposito para su Asignación',
                    '11'=>'11 Otro Uso',


                   ]
                 )


   ?>

   <?= $form->field($model, 'estado_fisico')->dropDownList(
                   [
                    '1'=>'1 Óptimo',
                    '2'=>'2 Regular',
                    '3'=>'3 Deteriorado',
                    '4'=>'4 Averiado',
                    '5'=>'5 Chatarra',
                    '6'=>'6 No Operativo',
                    '7'=>'7 Otra Condición Fisica',



                   ]
                 )


   ?>

   <?php

         echo  $form->field($model, 'is_colectivo')->widget(SwitchInput::classname(), [
                   'pluginOptions' => [
                           'onText' => 'Si',
                           'offText' => 'No',
                           'onColor' => 'success',
                           'offColor' => 'danger',
                   ]

           ]);

   ?>

   <?php

         echo  $form->field($model, 'is_asegurable')->widget(SwitchInput::classname(), [
                   'pluginOptions' => [
                           'onText' => 'Si',
                           'offText' => 'No',
                           'onColor' => 'success',
                           'offColor' => 'danger',
                   ]

           ]);

   ?>

   <?php

         echo  $form->field($model, 'activo')->widget(SwitchInput::classname(), [
                   'pluginOptions' => [
                           'onText' => 'Activo',
                           'offText' => 'Desactivado',
                           'onColor' => 'success',
                           'offColor' => 'danger',
                   ]

           ]);

   ?>




   <div class="form-group">
       <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
   </div>

    <?php ActiveForm::end(); ?>

</div>
