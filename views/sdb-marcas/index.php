<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbMarcasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Catalogo Marcas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


    <p>
        <?= Html::a(Yii::t('app', 'Crear Marca'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
            'attribute'=>'denominacion',
            'label'=>'Modelo',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->denominacion,
                    ['view','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos del Modelo' ]);
            },

            'format'=>'raw'
            ],
            'fabricante',
              [  'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}{update}',
            'buttons' => [

              'delete' => function ($url, $model) {
                return Html::a(Yii::t('app',''), ['sdb-marcas/delete', 'id' => $model->cod], [
                    'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                    
                    'data' => [
                        'confirm' => Yii::t('app', 'Estas Seguro de Eliminar la Marca: '.$model->denominacion ),
                        'method' => 'post',
                    ],
                ]);


              },



              'update' => function ($url, $model) {
                return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                           ['sdb-marcas/update','id'=>$model->cod],

                           ['title'=>'Actualizar',
                           'class'=>'blue',
                          ]);
              },
          ],
        ],
        ],
    ]); ?>

</div>
