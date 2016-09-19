
<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use app\models\BienesSearch;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Responsables */

$this->title = 'Datos del Responsable: ' . $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => 'Responsables', 'url' => ['index']];
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
  														<a href="<?= Url::to(['/responsables/index']) ?>">Responsables</a>
  													</li>


  												</ul>
  </div>
      <a href="<?= Url::to(['/responsables/update','id'=>$model->cod]) ?>" class="btn btn-primary">
      												<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
      												Actualizar
      </a>
  </div>




                      <h4 class="blue">
                             <span class="label label-success arrowed-in arrowed-right">
                                <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                      <b>Datos Principales</b>
                             </span>
                      </h4>



                            <div class="profile-user-info profile-user-info-striped">
                                              <div class="profile-info-row">
                                                <div class="profile-info-name">Cedula o Rif </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><code>   <?= $model->cedrif ?></code></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Nombres </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= $model->nombres ?></span>
                                                </div>
                                              </div>


                                                <div class="profile-info-row">
                                                  <div class="profile-info-name"> Apellidos </div>

                                                  <div class="profile-info-value">
                                                    <span class="editable" id="username"><?= $model->apellidos ?></span>
                                                  </div>
                                                </div>



                                                <div class="profile-info-row">
                                                  <div class="profile-info-name"> Direccion </div>

                                                  <div class="profile-info-value">

                                                    <span class="editable" id="country"><?= $model->direccion  ?></span>
                                                    </div>
                                                </div>


                                                <div class="profile-info-row">
                                                  <div class="profile-info-name"> Telefono </div>

                                                  <div class="profile-info-value">
                                                    <i class="fa fa-phone light-orange bigger-110"></i>
                                                    <span class="editable" id="username"><?= $model->telefono ?></span>
                                                  </div>
                                                </div>



                                                <div class="profile-info-row">
                                                  <div class="profile-info-name"> Fax </div>

                                                  <div class="profile-info-value">
                                                    <i class="fa fa-fax light-orange bigger-110"></i>
                                                    <span class="editable" id="country"><?= $model->fax?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                  <div class="profile-info-name"> Email </div>

                                                  <div class="profile-info-value">
                                                    <i class="fa fa-envelope-o light-orange bigger-110"></i>
                                                    <span class="editable" id="country"><?= $model->email  ?></span>
                                                    </div>
                                                </div>



                                              </div>




                          <h4 class="blue">


                                  <span class="label label-primary arrowed-in arrowed-right">
                                    <i class="ace-icon fa fa-code-fork smaller-80 align-middle"></i>
                                    <b>Datos de Adscripción</b>
                                  </span>
                          </h4>

                          <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Unidad de Adcripción </div>

                                              <div class="profile-info-value">
                                                <i class="fa fa-hospital-o light-orange bigger-110"></i>
                                                <span class="editable" id="username"><?= $model->codunidad0->descripcion ?></span>
                                              </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Tipo de Usuario </div>

                                              <div class="profile-info-value">

                                                <span class="editable" id="username"><?= $model->getTipo() ?></span>
                                              </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Cargo que Desempeña </div>

                                              <div class="profile-info-value">

                                                <span class="editable" id="username"><?= $model->cargo?></span>
                                              </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Alias de Profesion </div>

                                              <div class="profile-info-value">

                                                <span class="editable" id="username"><?= $model->alias?></span>
                                              </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Estatus </div>

                                              <div class="profile-info-value">

                                                <span class="editable" id="username"><?= $model->getActivoHtml() ?></span>
                                              </div>
                                            </div>





                                            </div>

                                            <h4 class="blue">


                                                    <span class="label label-primary arrowed-in arrowed-right">
                                                      <i class="ace-icon fa fa-bookmark-o smaller-80 align-middle"></i>
                                                      <b>Bienes Asignados</b>
                                                    </span>
                                            </h4>
                                            <?php

                                              $searchModel = new BienesSearch();
                                              $searchModel->codresp_directo=$model->cod;
                                              $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                                             ?>


                                           <div class="bienes-index">
                                            <?php Pjax::begin(['id' => 'countries']) ?>
                                            <?= GridView::widget([
                                                'dataProvider' => $dataProvider,
                                                'filterModel' => $searchModel,
                                                'columns' => [
                                                    ['class' => 'yii\grid\SerialColumn'],
                                                    'codigo',
                                                    'descripcion',
                                                    [
                                                        'attribute'=>'Tipo de Bien',
                                                        'value'=>function($model){
                                                          return $model->getTipoBien();
                                                        },
                                                        'filter' => Html::activeDropDownList($searchModel,
                                                        'tipobien', ArrayHelper::map([['cod'=>'0','descripcion'=>'Bienes Muebles'],
                                                                    ['cod'=>'1','descripcion'=>'BIenes de Uso']],
                                                        'cod', 'descripcion'),['class'=>'form-control','prompt' => 'No Filtro']),
                                                    ],
                                                  ],

                                            ]); ?>
                                            <?php Pjax::end() ?>

                                          </div>



                        </div>
