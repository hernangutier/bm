<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\tabs\TabsX;


/* @var $this yii\web\View */
/* @var $model app\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-form">

            <div class="panel panel-primary">
                  <div class="panel-heading">Consulta Rapida de     Bienes</div>
                      <div class="panel-body">
                        
                  
    
        

    <?php $form = ActiveForm::begin(); ?>
    
    <?php //-------------- Lineas -------------
       
       echo $form->field($model, 'cod')->widget(Select2::classname(), [
            
            'data' => ArrayHelper::map(app\models\Bienes::find()->where(['tipobien'=>'0'])->all(),'cod',
                 function($model, $defaultValue) {
                    return  $model->codigo . '-'. $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione la Clasificacion ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);
        
    ?> 


    <div class="form-group">
        <?= Html::submitButton('Consultar' , ['class' =>'btn btn-success' ]) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
