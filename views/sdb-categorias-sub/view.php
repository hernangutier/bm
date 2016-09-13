<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\SdbCategoriasEspSearch;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasSub */

$this->title = 'Datos de la Sub-Categoria: ' . $model->codigo.'-0000';
$this->params['breadcrumbs'][] = ['label' => 'Sdb Categorias Subs', 'url' => ['index']];
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
                              <a href="<?= Url::to(['/sdb-categorias-general/view','id'=>$model->codgen]) ?>">Ir atras..</a>
                            </li>


                          </ul>
  </div>
      <a href="<?= Url::to(['/sdb-categorias-sub/update','id'=>$model->cod]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
  </div>



  <h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                <b>Datos de la Sub-Categoria</b>
         </span>
  </h4>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">Código </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><code>   <?= $model->codigo . '-0000'?></code></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Descripción </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->descripcion ?></span>
                      </div>
                    </div>




  </div>


  <h4 class="blue">

          <span class="label label-primary arrowed-in arrowed-right">

            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                        <b>Categorias Especificas Asociadas (SUDEBIP)</b>

          </span>

  </h4>


  <?php

    $searchModel = new SdbCategoriasEspSearch();
    $searchModel->codsub=$model->cod;
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

   ?>

   <p>
       <?= Html::a(Yii::t('app', 'Crear Categoria Especifica'), ['sdb-categorias-esp/create','id'=>$model->cod], ['class' => 'btn btn-success']) ?>
   </p>


  <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          [
              'attribute'=>'codigo',
              'label'=>'Codigo',

              'value'=>function ($searchModel,$key, $index, $widget) {
                  return Html::a($searchModel->codigo,
                      ['/sdb-categorias-esp/view','id'=>$searchModel->cod],
                      ['title'=>'Ver Datos de Categoria Especifica' ]);
              },

              'format'=>'raw'
          ],
          [
            'attribute'=>'descripcion',
            'value'=>function ($model){
              return  $model->descripcion;
            },
          ],




          [  'class' => 'yii\grid\ActionColumn',
        'template' => '{delete}{update}',
        // 'dropdown' => true,
        'buttons' => [

         'delete' => function ($url, $model) {
           return Html::a(Yii::t('app',''), ['sdb-categorias-esp/delete', 'id' => $model->cod], [
               'class' => 'ace-icon fa fa-trash-o bigger-120 red',
               'data' => [
                   'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Items?'),
                   'method' => 'post',
               ],
           ]);



          },
          'update' => function ($url, $model) {
            return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                       ['sdb-categorias-esp/update','id'=>$model->cod],

                       ['title'=>'Actualizar',
                       'class'=>'blue',
                      ]);
          },








      ],
    ],
      ],
  ]); ?>




</div>
