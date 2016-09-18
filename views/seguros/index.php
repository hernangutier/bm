<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\SbdSeguros;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SegurosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administrar Polizas');
$this->params['breadcrumbs'][] = $this->title;

//----------- Jquery para mostrar efecto de ToolTip

?>


<div class="container">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Poliza'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'npoliza|',
            'label'=>'N° de Poliza',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return Html::a($searchModel->npoliza,
                    ['view','id'=>$searchModel->cod],
                    ['title'=>'Ver Datos de la Poliza' ]);
            },

            'format'=>'raw'
            ],

            [
            'attribute'=>'codbien',
            'label'=>'N° de Bien Asegurado',

            'value'=>function ($searchModel, $key, $index, $widget) {
                return '<a title="'. $searchModel->codbien0->descripcion . '" class="blue" id="hide-option" href="#">
															<i class="ace-icon fa fa-desktop"></i>'
															. $searchModel->codbien0->codigo .
											 '</a>';
            },
            'filter' => Html::activeDropDownList($searchModel,
            'codbien', ArrayHelper::map(app\models\Bienes::find(['is_asegurable'=>true])->andFilterWhere(['=', 'is_asegurable', true])->all(),
            'cod', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),

            'format'=>'raw'
            ],

            [
            'attribute'=>'status',
            'label'=>'Estado de la Poliza',
            'filter' =>['0'=>'Vigentes',
                        '1'=>'Vencidas',
                        '2'=>'Anuladas',
                       ],

            'value'=>function ($searchModel, $key, $index, $widget) {
                return $searchModel->getStatusHtml();
            },

            'format'=>'raw'
            ],

            [
                'attribute'=>'Aseguradora (SUDEBIP)',
                'value'=>function($model){
                  if (is_null($model->codaseguradora)){
                    return '';
                  }  else {
                      return $model->codaseguradora0->razon;
                  }

                },
                'filter' => Html::activeDropDownList($searchModel,
                'codaseguradora', ArrayHelper::map(app\models\SdbSeguros::find()->all(),
                'cod', 'razon'),['class'=>'form-control','prompt' => 'No Filtro']),
            ],
            'otra_aseguradora',

            'monto',
            // 'tipo',
            // 'moneda',
            // 'especifique_moneda',
            // 'f_ini',
            // 'f_fin',
            // 'resp_civil',
            // 'tipo_cobertura',
            // 'especifique_tipo_cobertura',
            // 'descripcion_cobertura',
            // 'codbien',
            // 'active:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
