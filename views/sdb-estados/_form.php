<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SdbEstados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sdb-estados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //-------------- Contactos -------------
       
       echo $form->field($model, 'codpais')->widget(Select2::classname(), [
            
            'data' => ArrayHelper::map(app\models\SdbPaises::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->codigo.'     '.$model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione el Pais ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);
        
    ?> 

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
