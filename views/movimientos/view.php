<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */

$this->title = 'Administrar Movimiento N°: ' . $model->ncontrol;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Movimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
    //-------------- Codigo para Desabilitar Cahe del Navegador -----
        $this->registerJs('
                    var path = "Test.aspx"; //write here name of your page
            history.pushState(null, null, path + window.location.search);
            window.addEventListener("popstate", function (event) {
                history.pushState(null, null, path + window.location.search);
            });
        ');
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
  														<a href="#">Inicio</a>
  													</li>

  													<li>
  														<a href="<?= Url::to(['/movimientos/index']) ?>">Movimientos</a>
  													</li>


  												</ul>
                          <?php
                            if ($model->status==0){
                              echo '<a href="' . Url::to(['/movimientos/anular','id'=>$model->cod]) . ' " class="btn btn-danger">
                              												<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              												Anular
                                  </a>';
                              echo '<a href="'. Url::to(['/movimientos/paso2','id'=>$model->cod]) .'" class="btn btn-info">
                              												<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              												Continuar
                                   </a>';

                            }
                              echo '<a href="'. Url::base(). '/report/movimientos_comprobante.php?id='. $model->cod .'" class="btn btn-default">
                                                     <i class="ace-icon fa fa-print align-top bigger-125"></i>
                                                     Imprimir Comprobante
                                  </a>';


                           ?>


  </div>


  </div>




                      <h4 class="blue">
                             <span class="label label-success arrowed-in arrowed-right">
                                <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                      <b>Datos del Movimiento</b>
                             </span>
                      </h4>



                            <div class="profile-user-info profile-user-info-striped">
                                              <div class="profile-info-row">
                                                <div class="profile-info-name">Fecha de la Transaccción </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username">   <?= $model->fecha ?></span>
                                                </div>
                                              </div>
                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Tipo </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= $model->getTipo() ?></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Origen de los Bienes </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= is_null($model->codundOrigen) ? 'No Aplica': $model->codundOrigen->descripcion ?></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Destino de los Bienes </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?=  is_null($model->codundDestino) ? 'No Aplica': $model->codundDestino->descripcion ?></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Responsable Anterior </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= is_null($model->coduserOrigen) ? 'No Aplica': $model->coduserOrigen->getNombreCompleto() ?></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Nuevo Responsable de los Bienes </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= is_null($model->coduserDestino) ? 'No Aplica': $model->coduserDestino->getNombreCompleto() ?></span>
                                                </div>
                                              </div>

                          </div>








                          <h4 class="blue">
                                   <span class="label label-primary arrowed-in-right">
                                      <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                            Bienes Afectados
                                   </span>
                          </h4>
                      <?php
                          echo Yii::$app->controller->renderPartial('view_bienes',['model'=>$model]);
                       ?>





</div>
