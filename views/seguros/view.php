<?php
use Yii;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\SegurosExpSearch;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */

$this->title = 'Datos de la Poliza N° ' . $model->npoliza;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seguros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


  <div class="btn-toolbar">

    <div class="btn-group">
                          <button class="btn btn-default">Ir a</button>

                          <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                            <span class="ace-icon fa fa-caret-down icon-only"></span>
                          </button>

                          <ul class="dropdown-menu dropdown-success">
                            <li>
                              <a href="<?= Url::home() ?>">Inicio</a>
                            </li>

                            <li>
                              <a href="<?= Url::to(['/seguros/index']) ?>">Polizas</a>
                            </li>


                          </ul>
  </div>
      <a href="<?= Url::to(['/seguros/update','id'=>$model->cod,'url'=>Url::current()]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
  </div>





  <h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Datos Generales de la Poliza
         </span>
  </h4>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">N° de Poliza </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><code>   <?= $model->npoliza ?></code></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Compañia Aseguradora </div>

                      <div class="profile-info-value">
                          <span class="editable" id="username"><?= $model->codaseguradora0->razon ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Otra Aseguradora </div>

                      <div class="profile-info-value">
                          <span class="editable" id="username"><?= $model->otra_aseguradora ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Monto Asegurado </div>

                      <div class="profile-info-value">
                        <i class="fa fa-money light-orange bigger-150"></i>
                          <span class="editable" id="username"><h3 class="text-primary"> <b> <?= number_format($model->monto,2) . ' Bsf.' ?> </b> </h3></span>
                      </div>
                    </div>




  </div>


  <h4 class="blue">
         <span class="label label-primary arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Detalles de la Poliza
         </span>
  </h4>
  <div class="profile-info-row">
    <div class="profile-info-name"> Inicio de Vigencia </div>

    <div class="profile-info-value">
        <span class="editable" id="username"><?= $model->f_ini ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Vencimiento </div>

    <div class="profile-info-value">
        <span class="editable" id="username"><?= $model->f_ini ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Tipo de Poliza </div>

    <div class="profile-info-value">
        <span class="editable" id="username"><?= $model->tipo=='I' ? 'Individual' : 'Colectiva' ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Tipo Cobertura </div>

    <div class="profile-info-value">
        <span class="editable" id="username"><?= $model->getTipoCobertura() ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Especificación del Tipo de Cobertura </div>

    <div class="profile-info-value">
        <span class="editable" id="username"><?= $model->especifique_tipo_cobertura ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Responsabilidad Civil </div>

    <div class="profile-info-value">
        <span class="editable" id="username"><?= $model->resp_civil==1 ? '<span class="label label-success arrowed-in arrowed-in-right">Si</span>' : '<span class="label label-danger arrowed">No</span>' ?></span>
    </div>
  </div>

  <div class="profile-info-row">
    <div class="profile-info-name"> Estatus de la Poliza </div>

    <div class="profile-info-value">
        <span class="editable" id="username"><?= $model->getVigenciaHtml() ?></span>
    </div>
  </div>

  <div class="hr hr32 hr-dotted"></div>

  <h4 class="blue">
         <span class="label label-primary arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Archivo Digital
         </span>
  </h4>

  <a href="<?= Url::to(['/seguros-exp/create','id'=>$model->cod]) ?>" class="btn btn-white btn-info btn-bold">
												<i class="ace-icon fa fa-paperclip bigger-120 blue"></i>
												Subir Archivo
 </a>

 <?php

   $searchModel = new SegurosExpSearch();
   $searchModel->codseg=$model->cod;
   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

  ?>

<br>
<br>

<div class="bienes-index">

 <?= GridView::widget([
     'dataProvider' => $dataProvider,

     'columns' => [
         ['class' => 'yii\grid\SerialColumn'],
         [
         'attribute'=>'filename',
         'label'=>'Archivo Digital',

         'value'=>  function ($searchModel, $key, $index, $widget) {
             return Html::a($searchModel->filename,
                 ['/seguros-exp/visor','id'=>$searchModel->cod,'url'=>Url::toRoute(['/seguros/view','id'=>$searchModel->codseg])],
                 ['title'=>'Ver Archivo' ]);
          },



         'format'=>'raw'
         ],

         'titulo',
         ['class' => 'yii\grid\ActionColumn',
             'template' => '{descargar}{delete}',

              //--------- Actualizar ---
          'buttons' => [




            'descargar' => function ($url,$searchModel) {
              return Html::a( '<i class="ace-icon fa  fa-download  bigger-120"></i>',
                         ['seguros-exp/download','id'=>$searchModel->cod,'url'=> Url::current()],

                         ['title'=>'Descargar Archivo',
                         'class'=>'blue',
                        ]);
            },

            'delete' => function ($url, $searchModel) {
              return Html::a(Yii::t('app',''), ['seguros-exp/delete', 'id' => $searchModel->cod], [
                  'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                  'data' => [
                      'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Archivo: '.$searchModel->filename ),
                      'method' => 'post',
                  ],
              ]);


            },



          ],
         ],


       ],

 ]); ?>


</div>


</div>
