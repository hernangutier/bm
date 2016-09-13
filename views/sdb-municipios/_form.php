<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SdbMunicipios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sdb-municipios-form">

    <?php $form = ActiveForm::begin(); ?>

        <?php //-------------- Estatos -------------
       
       echo $form->field($model, 'codest')->widget(Select2::classname(), [
            
            'data' => ArrayHelper::map(app\models\SdbEstados::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->codigo.'     '.$model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione el Estado ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);
        
    ?> 

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
