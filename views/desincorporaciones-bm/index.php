<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use rmrevin\yii\fontawesome\FA;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DesincorporacionesBmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Desincorporaciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desincorporaciones-bm-index">






    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ncontrol',

            

            [
                'attribute'=>'Tipo de Desincorporación',
                'value'=>function($model){
                  return $model->concepto0->descripcion;
                },
                'filter' => Html::activeDropDownList($searchModel,
                'concepto', ArrayHelper::map(app\models\DesincorporacionesConceptos::find()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Tipo de Desincorporación']),
            ],

            [
                'attribute'=>'Periodo',
                'value'=>function($model){
                  return $model->periodo0->descripcion;
                },
                'filter' => Html::activeDropDownList($searchModel,
                'periodo', ArrayHelper::map(app\models\Periodos::find()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar Tipo de Desincorporación']),
            ],
            [
                'attribute'=>'status',
                'filter' =>['0'=>'en elaboración',
                            '1'=>'en espera de confirmación',
                            '2'=>'Procesada',
                            '3'=>'Anulada'
                          ],
                'value'=>function($model){
                  return $model->getStatusHtml();
                },
                'format'=>'raw',


            ],



            'fecha',
            [  'class' => 'yii\grid\ActionColumn',
          'template' => '{administrar}',
          // 'dropdown' => true,
          'buttons' => [




            'administrar' => function ($url, $model) {
              return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('tasks')]) . ' Administrar Desincorporacion',
                              ['desincorporaciones-bm/view-admin','id'=>$model->cod],

                              ['title'=>'Administrar Desincorporacion',
                              'class'=>"btn btn-success",
                             ]);
            },
        ],
      ],
        ],
    ]); ?>

</div>
