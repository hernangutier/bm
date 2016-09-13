<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadesAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidades Administrativas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidades-admin-index">

    <p>
        <?= Html::a('Crear Unidad Administrativa', ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['title'=>'Ver Datos de la Unidada Adminstrativa' ]);
            },

            'format'=>'raw'
            ],

            'descripcion',

            [
                'attribute'=>'Categoria',
                'value'=>'categoria0.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'categoria', ArrayHelper::map(app\models\SdbCatUnidadesAdmin::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Categoria']),
            ],

            [
                'attribute'=>'Sede de Adscripción',
                'value'=>'codsede0.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'codsede', ArrayHelper::map(app\models\SdbSedes::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Categoria']),
            ],



            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}{asignar}',

                 //--------- Actualizar ---
             'buttons' => [
               'delete' => function ($url, $searchModel) {
                 return Html::a(Yii::t('app',''), ['unidades-admin/delete', 'id' => $searchModel->cod], [
                     'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                     'data' => [
                         'confirm' => Yii::t('app', 'Estas Seguro de Eliminar la Unidad Administrativa: '.$searchModel->codigo ),
                         'method' => 'post',
                     ],
                 ]);


               },



               'update' => function ($url,$searchModel) {
                 return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                            ['unidades-admin/update','id'=>$searchModel->cod],

                            ['title'=>'Actualizar',
                            'class'=>'blue',
                           ]);
               },


                 'asignar' => function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-equalizer"></span>',['asignarpadre','id'=>$model->cod]);

                    },
             ],
            ],
        ],
    ]); ?>
    </div>
