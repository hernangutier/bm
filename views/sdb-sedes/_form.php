<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sdb-sedes-form">

         <div class="panel panel-primary">
               <div class="panel-heading">Crear Sede</div>
                   <div class="panel-body">
     
 
     

    <?php $form = ActiveForm::begin(); ?>
 <?php 
        $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-asterisk"> </i> Datos Basicos',
            'content'=>$this->render('basicos',['model'=>$model,'form'=>$form]),
            'active'=>true
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-book"></i> Datos de Ubicación',
            'content'=>$this->render('ubicacion',['model'=>$model,'form'=>$form]),
            //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/proveedores/create_basicos'])]
        ],
        
        [
            'label'=>'<i class="glyphicon glyphicon-book"></i> Datos de Localizacion',
            'content'=>$this->render('localizacion',['model'=>$model,'form'=>$form]),
            //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/proveedores/create_basicos'])]
        ],
        
    ];

 ?>   
    

 <?=
    TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);
?>     






    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
                
               </div>
         </div>
</div>
