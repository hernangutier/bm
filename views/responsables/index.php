<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponsablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Responsables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsables-index">





    <p>
        <?= Html::a('Crear Responsable', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'cedrif',
            'label'=>'Cedula o Rif.',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->cedrif,
                    ['view','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos del Responsable' ]);
            },

            'format'=>'raw'
            ],
            'NombreCompleto',

            [
                'attribute'=>'codunidad',
                'value'=>'codunidad0.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'codunidad', ArrayHelper::map(app\models\UnidadesAdmin::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],
            // 'email:email',
            // 'cargo',
            // 'fregistro',
            // 'personal',
            // 'alias',
            // 'codunidad',
            // 'cod',
            // 'apellidos',

            [  'class' => 'yii\grid\ActionColumn',
          'template' => '{delete}{update}',
          // 'dropdown' => true,
          'buttons' => [

            'delete' => function ($url, $searchModel) {
              return Html::a(Yii::t('app',''), ['responsables/delete', 'id' => $searchModel->cod], [
                  'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                  'data' => [
                      'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Responsable: '.$searchModel->cedrif ),
                      'method' => 'post',
                  ],
              ]);


            },



            'update' => function ($url,$searchModel) {
              return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                         ['responsables/update','id'=>$searchModel->cod],

                         ['title'=>'Actualizar',
                         'class'=>'blue',
                        ]);
            },
        ],
      ],
        ],
    ]); ?>



  </div>
