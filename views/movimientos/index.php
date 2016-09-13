<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MovimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Movimientos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-index">




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'ncontrol',
            'label'=>'N° de Control',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->ncontrol,
                    ['view','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos del Movimiento' ]);
            },

            'format'=>'raw'
            ],
            'fecha',

            [
                'attribute'=>'tipo',
                'filter' =>['0'=>'Asignacion',
                            '1'=>'Traspaso de Bienes entre Usuarios',
                            '2'=>'Desvincular Bienes',
                            '3'=>'Traslado de  Bienes entre Unidades Administrativas'
                          ],
                'value'=>function($model){
                  return $model->getTipo();
                },
                'format'=>'raw',


            ],
            [
                'attribute'=>'status',
                'filter' =>['0'=>'Pendientes',
                            '1'=>'Procesadas',
                            '2'=>'Anuladas',

                          ],
                'value'=>function($model){
                  return $model->getStatusHtml();
                },
                'format'=>'raw',


            ],

            [  'class' => 'yii\grid\ActionColumn',
          'template' => '{administrar}{continuar}',
          // 'dropdown' => true,
          'buttons' => [




            'administrar' => function ($url, $model) {
              return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('tasks')]) . ' Administrar Movimiento',
                              ['movimientos/view','id'=>$model->cod],

                              ['title'=>'Administrar Movimiento',
                              'class'=>"btn btn-success",
                             ]);
            },


        ],
      ],
        ],
    ]); ?>

</div>
