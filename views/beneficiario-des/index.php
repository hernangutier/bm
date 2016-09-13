<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeneficiarioDesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Beneficiarios en Desincorporaciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficiario-des-index">



    <p>
        <?= Html::a(Yii::t('app', 'Crear Beneficiario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'cedrif',
            'razon',
            'direccion',


            [  'class' => 'yii\grid\ActionColumn',
          'template' => '{delete}{update}',
          // 'dropdown' => true,
          'buttons' => [

            'delete' => function ($url, $model) {
              return Html::a(Yii::t('app',''), ['beneficiario-des/delete', 'id' => $model->cod], [
                  'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                  'data' => [
                      'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Beneficiario: '.$model->razon ),
                      'method' => 'post',
                  ],
              ]);


            },




            'update' => function ($url, $model) {
              return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                         ['beneficiario-des/update','id'=>$model->cod],

                         ['title'=>'Actualizar',
                         'class'=>'blue',
                        ]);
            },
        ],
      ],

        ],
    ]); ?>

</div>
