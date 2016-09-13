<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasEsp */
/* @var $form yii\widgets\ActiveForm */
?>


<div class='container '>




    <?php $form = ActiveForm::begin(); ?>

     <?php //-------------- Contactos -------------

       echo $form->field($model, 'codsub')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(app\models\SdbCategoriasSub::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->codigo.'     '.$model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Sub-Categoria ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
