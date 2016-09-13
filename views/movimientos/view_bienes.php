<?php
use yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use yii\grid\GridView;
use app\models\MovimientosDtSearch;
use kartik\select2\Select2;
use app\models\Bienes;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */
/* @var $form yii\widgets\ActiveForm */
/* @var $bien app\models\Bienes */
?>
<?php
  $bien= new Bienes();
  $searchModel = new MovimientosDtSearch();
  $searchModel->codmov=$model->cod;
  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

 ?>
<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
          'attribute'=>'codbien',
          'label'=>'N° de Bien',
          'value'=>function ($model){
            return  $model->codbien0->codigo;
          },
        ],
        [
          'attribute'=>'descripcion',
          'value'=>function ($model){
            return  $model->codbien0->descripcion;
          },
        ],

        [
          'attribute'=>'costo',
          'value'=>function ($model){
            return  number_format($model->codbien0->costo,2);
          },
        ],



    ],
]); ?>
<?php Pjax::end(); ?>
