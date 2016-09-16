<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Bienes */

$this->title = 'Resumen de Datos del Bien N°: ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes'), 'url' => ['index']];
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
                              <a href="<?= Url::to(['/bienes/index']) ?>">Bienes</a>
                            </li>


                          </ul>

      <a href="<?= Url::to(['/bienes/update','id'=>$model->cod]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
      <?php
          if ($model->is_asegurable){
              echo '<a href="' . Url::to(['/bienes/set-seguro','id'=>$model->cod,'url'=>Url::current()]) . '" class="btn btn-info">
                                      <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                                      Actualizar Poliza
              </a>';
          }
       ?>

      </div>
  </div>


  <h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Datos Generales
         </span>
  </h4>



  <div class="profile-user-info profile-user-info-striped">
                   <div class="profile-info-row">
                     <div class="profile-info-name">Foto </div>

                     <div class="profile-info-value">
                       <span class="editable" id="username">
                         <div class="col-3 center">


                         <span class="profile-picture">
                                                 <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="../web/imgbien/sudebip.png">
                         </span>
                         <p>
 											    <button class="btn btn-primary btn-block">Subir Foto</button>
 										    </p>
                        </div>

                        </div>

                       </span>
                     </div>




                    <div class="profile-info-row">
                      <div class="profile-info-name"> Descripción </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Estatus de Uso </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->getEstadoUso() ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Linea </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->codlin0->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Categoria (SUDEBIP) </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= is_null($model->codcat0) ? 'No Disponible' : $model->codcat0->codsub0->codigo . '-' . $model->codcat0->codigo . ' ' . $model->codcat0->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Clasificacion Ségun Pub. 21 </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->codclas0->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Serial </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->serial ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Costo Bsf. </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= number_format($model->costo,2) ?></span>
                      </div>
                    </div>




  </div>

  <h4 class="blue">
         <span class="label label-primary arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Datos de Ubicación y Responsables del Bien
         </span>
  </h4>
  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">Sede </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->codUndActual->codsede0->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name">Unidad Administrativa </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?=  $model->codUndActual->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Usuario Administrativo </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= is_null($model->codUndActual->codresp0) ? 'No Disponible' : $model->codUndActual->codresp0->getNombreCompleto()  ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Usuario Directo </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= is_null($model->codresp_directo) ? 'No Disponible' : $model->codrespDirecto->getNombreCompleto() ?></span>
                      </div>
                    </div>






  </div>

  <h4 class="blue">
         <span class="label label-primary arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Condiciones del Bien
         </span>
  </h4>
      <div class="profile-user-info profile-user-info-striped">

        <div class="profile-info-row">
          <div class="profile-info-name"> Estado Fisico </div>

          <div class="profile-info-value">
            <span class="editable" id="username"><?= $model->getEstadoFisicoHtml() ?></span>
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name"> Estado Fisico </div>

          <div class="profile-info-value">
            <span class="editable" id="username"><?= $model->getEstadoFisicoHtml() ?></span>
          </div>
        </div>


      </div>

</div>
