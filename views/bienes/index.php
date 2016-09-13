<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\SbdCategoriasEsp;
use  yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BienesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bienes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-index">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'codigo',
            'label'=>'N° de Bien',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->codigo,
                    ['view-resumen','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos del Bien' ]);
            },

            'format'=>'raw'
            ],

            'descripcion',
            [
                'attribute'=>'Ubicacion Actual',
                'value'=>function($model){
                  return $model->codUndActual->descripcion;
                },
                'filter' => Html::activeDropDownList($searchModel,
                'cod_und_actual', ArrayHelper::map(app\models\UnidadesAdmin::find()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],
            [
                'attribute'=>'Linea',
                'value'=>function($model){
                  return $model->codlin0->descripcion;
                },
                'filter' => Html::activeDropDownList($searchModel,
                'codlin', ArrayHelper::map(app\models\Lineas::find()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],
            [
                'attribute'=>'Categoria (SUDEBIP)',
                'value'=>function($model){
                  if (is_null($model->codcat0)){
                    return '';
                  }  else {
                      return $model->codcat0->descripcion;
                  }

                },
                'filter' => Html::activeDropDownList($searchModel,
                'codcat', ArrayHelper::map(app\models\SdbCategoriasEsp::find()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],



            // 'codresp_directo',
            // 'status',
            // 'costo',
            // 'notasigned',
            // 'observacion',
            // 'isvehicle',
            // 'codvehicle',
            // 'foto:ntext',
            // 'cod_und_actual',
            // 'isasigned',
            // 'descripcion:ntext',
            // 'marca',
            // 'codclas',
            // 'fcreacion',
            // 'coduser',
            // 'operativo',
            // 'tipobien',
            // 'codlin',
            // 'localizacion',
            // 'fdesinc',
            // 'pendientedesinc',
            // 'undmedida',
            // 'aplicaiva',
            // 'existe',
            // 'codcat',
            // 'statusfisical',
            // 'disponibilidad',
            // 'foto1',
            // 'mantenimiento',
            // 'estado_uso',
            // 'estado_fisico',
            // 'old_cod',
            // 'activo',
            // 'is_colectivo:boolean',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}',

                 //--------- Actualizar ---
             'buttons' => [




               'update' => function ($url,$searchModel) {
                 return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                            ['bienes/edith','id'=>$searchModel->cod,'url'=> Url::current()],

                            ['title'=>'Adecuar Datos',
                            'class'=>'blue',
                           ]);
               },



             ],
            ],

        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
