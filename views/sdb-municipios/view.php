<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SdbMunicipios */

$this->title = 'Datos del Municipio: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Municipios SUDEBIP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-municipios-view">

    <?php 
    $attributes = [
    [
        'group'=>true,
        'label'=>'Datos Basicos (Municipios)', 
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
    //-------------- Columna Estado
    [
        'columns' => [
            [
                'attribute'=>'codest',
                'value'=>$model->codest0->descripcion,
                'valueColOptions'=>['style'=>'width:30%'],
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
