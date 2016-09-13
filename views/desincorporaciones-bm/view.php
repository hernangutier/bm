<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesBm */

$this->title = 'Administrar Desincorporacion';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Desincorporaciones Bms'), 'url' => ['index']];
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
                              <a href="<?= Url::to(['/desincorporaciones-bm/index']) ?>">Desincorporaciones</a>
                            </li>


                          </ul>
    </div>
    </div>


<h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Datos de la Desincorporación
         </span>
  </h4>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">N° de Control </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><code>   <?= $model->ncontrol ?></code></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Concepto </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->concepto0->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Fecha de Desincorporación </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->fecha ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Periodo </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->periodo0->descripcion ?></span>
                      </div>
                    </div>




  </div>


            <h4 class="blue">
                   <span class="label label-primary arrowed-in-right">
                      <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                            Datos Adicionales
                   </span>
            </h4>

    <div class="profile-user-info profile-user-info-striped">
                      <?php
                            if ($model->concepto0->aplica_acta) {
                                echo '<div class="profile-info-row">
                                  <div class="profile-info-name">N° de Acta de Desincorporación </div>

                                  <div class="profile-info-value">
                                    <span class="editable" id="username">'. $model->nacta . '</span>
                                  </div>
                                </div>';

                            }

                       ?>


                      <?php
                                if ($model->concepto0->aplica_terceros) {
                                if (!(is_null($model->codben0))) {
                                  echo '<div class="profile-info-row">
                                    <div class="profile-info-name"> Cedula Beneficiario </div>

                                    <div class="profile-info-value">
                                      <span class="editable" id="username">' .  $model->codben0->cedrif . '</span>
                                    </div>
                                  </div>

                                  <div class="profile-info-row">
                                    <div class="profile-info-name"> Fecha de Desincorporación </div>

                                    <div class="profile-info-value">
                                      <span class="editable" id="username">' . $model->fecha .'</span>
                                    </div>
                                  </div>

                                  <div class="profile-info-row">
                                    <div class="profile-info-name"> Periodo </div>

                                    <div class="profile-info-value">
                                      <span class="editable" id="username">' . $model->periodo0->descripcion  . '</span>
                                    </div>
                                  </div>';
                                }
                                }

                       ?>





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
