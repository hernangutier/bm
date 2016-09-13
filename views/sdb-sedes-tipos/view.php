<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedesTipos */

$this->title = 'Datos del Tipo de Lugar de Ubicación: ' .$model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Tipos de Lugares de Ubicación SUDEBIP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-sedes-tipos-view">

   

 <?php 
    $attributes = [
    [
        'group'=>true,
        'label'=>'Datos Basicos (Tipos de Lugares de Ubicación)', 
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'codigo', 
                'format'=>'raw', 
                'value'=>'<kbd>'.$model->codigo.'</kbd>',
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],

            [
                'attribute'=>'descripcion', 
                'label'=>'Descripcion #',
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            
        ],
    ],
    


        
       
    ];
    ?>
    
    
    <?= 
          

             //------------------ Creamos el Detail View ---    
             DetailView::widget([
                'model' => $model,
                'attributes' => $attributes,
                'mode' => 'view',
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                //'hAlign'=>$hAlign,
                //'vAlign'=>$vAlign,
                //'fadeDelay'=>$fadeDelay,
                'deleteOptions'=>[ // your ajax delete parameters
                    'params' => ['id' => 1000, 'kvdelete'=>true],
                ],
                'container' => ['id'=>'kv-demo'],
                //'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
                ]);
            
    ?>



</div>
