<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbCategoriasGeneralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias Generales (SUDEBIP)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-categorias-general-index">


    <p>
        <?= Html::a('Crear Categoria General', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute'=>'codigo',
            'label'=>'Código',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codigo,
                    ['view','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos de la Categoria General' ]);
            },

            'format'=>'raw'
            ],
            'descripcion',

            [  'class' => 'yii\grid\ActionColumn',
          'template' => '{delete}{update}',
          // 'dropdown' => true,
          'buttons' => [

            'delete' => function ($url, $searchModel) {
              return Html::a(Yii::t('app',''), ['sdb-categorias-general/delete', 'id' => $searchModel->cod], [
                  'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                  'data' => [
                      'confirm' => Yii::t('app', 'Estas Seguro de Eliminar la Categoria General: '.$searchModel->descripcion ),
                      'method' => 'post',
                  ],
              ]);


            },



            'update' => function ($url,$searchModel) {
              return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                         ['sdb-categorias-general/update','id'=>$searchModel->cod],

                         ['title'=>'Actualizar',
                         'class'=>'blue',
                        ]);
            },
        ],
      ],
        ],
    ]); ?>








</div>
