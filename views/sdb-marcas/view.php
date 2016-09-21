<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\GridView;
use  yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use app\models\SdbModelosSearch;


/* @var $this yii\web\View */
/* @var $model app\models\SdbMarcas */

$this->title = 'Datos de la  Marca (SUDEBIP): ' . $model->denominacion;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='container '>


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
  														<a href="<?= Url::to(['/sdb-marcas/index']) ?>">Catalogo de Marcas</a>
  													</li>


  												</ul>
  </div>
      <a href="<?= Url::to(['/sdb-marcas/update','id'=>$model->cod]) ?>" class="btn btn-primary">
      												<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
      												Actualizar
      </a>
  </div>




                      <h4 class="blue">
                             <span class="label label-success arrowed-in arrowed-right">
                                <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                      <b>Datos la Marca (SUDEBIP)</b>
                             </span>
                      </h4>



                            <div class="profile-user-info profile-user-info-striped">
                                              <div class="profile-info-row">
                                                <div class="profile-info-name">Denominación </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"> <?= $model->denominacion  ?></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Fabricante </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= $model->fabricante ?></span>
                                                </div>
                                              </div>




                                              </div>

                        <h4 class="blue">

                                <span class="label label-primary arrowed-in arrowed-right">

                                  <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                                              <b>Modelos Asociados</b>

                                </span>

                        </h4>


                        <?php

                          $searchModel = new SdbModelosSearch();
                          $searchModel->codmarca=$model->cod;
                          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                         ?>

                         <p>
                             <?= Html::a(Yii::t('app', 'Crear Modelo'), ['sdb-modelos/create','id'=>$model->cod], ['class' => 'btn btn-success']) ?>
                         </p>


                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'descripcion',
                                [
                                    'attribute'=>'Bien ségun catalogo al que aplica',
                                    'value'=>function($model){
                                      return $model->codSegunCat->descripcion;

                                    },
                                    'filter' => Html::activeDropDownList($searchModel,
                                    'cod_segun_cat', ArrayHelper::map(app\models\SdbCategoriasEsp::find()->all(),
                                    'cod', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                                ],
                                ['class' => 'yii\grid\ActionColumn',
                                    'template' => '{delete}{update}',

                                     //--------- Actualizar ---
                                 'buttons' => [



                                   'delete' => function ($url, $model) {
                                     return Html::a(Yii::t('app',''), ['sdb-modelos/delete', 'id' => $model->cod], [
                                         'class' => 'ace-icon fa fa-trash-o bigger-120 red',
                                         'data' => [
                                             'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Modelo: '.$model->descripcion ),
                                             'method' => 'post',
                                         ],
                                     ]);


                                   },


                                   'update' => function ($url,$searchModel) {
                                     return Html::a( '<i class="ace-icon fa fa-pencil bigger-120"></i>',
                                                ['sdb-modelos/update','id'=>$searchModel->cod],

                                                ['title'=>'Actualizar Modelo',
                                                'class'=>'blue',
                                               ]);
                                   },



                                 ],
                                ],







                            ],
                        ]); ?>
