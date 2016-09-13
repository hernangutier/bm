<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProveedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proveedores');
$this->params['breadcrumbs'][] = $this->title;
?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Proveedor'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['title'=>'Ver Datos del Proveedor' ]);
            },

            'format'=>'raw'
            ],
            'cedrif',
            'razon',
            'direccion',
            'telefono',
            'fax',
            // 'email:email',
            // 'responsable',
            // 'tlfcontact',
            // 'observacion',
            // 'fechacreacion',
            // 'activo',
            // 'tipo',
            // 'cod',
            // 'tipo_de_proveedor',
            // 'codigo',
            // 'otra_descripcion',
            // 'telefono2',

            //['class' => 'yii\grid\ActionColumn'],
            [  'class' => 'yii\grid\ActionColumn',
          'template' => '{delete}{update}',
          // 'dropdown' => true,
          'buttons' => [

            'delete' => function ($url, $model) {
              return Html::a(Yii::t('app',''), ['proveedores/delete', 'id' => $model->cod], [
                  'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                  'data' => [
                      'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Proveedor: '.$model->razon ),
                      'method' => 'post',
                  ],
              ]);


            },



            'update' => function ($url, $model) {
              return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                         ['proveedores/update','id'=>$model->cod],

                         ['title'=>'Actualizar',
                         'class'=>'blue',
                        ]);
            },
        ],
      ],
        ],
    ]); ?>
