<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */

$this->title = 'Datos del Proveedor: '. $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Proveedores', 'url' => ['index']];
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
  														<a href="<?= Url::to(['/proveedores/index']) ?>">Proveedores</a>
  													</li>


  												</ul>
  </div>
      <a href="<?= Url::to(['/proveedores/update','id'=>$model->cod]) ?>" class="btn btn-primary">
      												<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
      												Actualizar
      </a>
  </div>




                      <h4 class="blue">
                             <span class="label label-success arrowed-in arrowed-right">
                                <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                      <b>Datos Basicos</b>
                             </span>
                      </h4>



                            <div class="profile-user-info profile-user-info-striped">
                                              <div class="profile-info-row">
                                                <div class="profile-info-name">Código </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><code>   <?= $model->codigo ?></code></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Cedula o Rif </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= $model->cedrif ?></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Denominación </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= $model->razon ?></span>
                                                </div>
                                              </div>


                                                <div class="profile-info-row">
                                                  <div class="profile-info-name"> Otra Descripción </div>

                                                  <div class="profile-info-value">
                                                    <span class="editable" id="username"><?= $model->otra_descripcion ?></span>
                                                  </div>
                                                </div>



                                                <div class="profile-info-row">
                                                  <div class="profile-info-name"> Tipo de Proveedor </div>

                                                  <div class="profile-info-value">

                                                    <span class="editable" id="country"><?= $model->getTipo()  ?></span>
                                                    </div>
                                                </div>


                                              </div>




                          <h4 class="blue">


                                  <span class="label label-primary arrowed-in arrowed-right">
                                    <i class="ace-icon fa fa-code-fork smaller-80 align-middle"></i>
                                    <b>Datos de Ubicación</b>
                                  </span>
                          </h4>

                          <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Dirección </div>

                                              <div class="profile-info-value">
                                                <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                <span class="editable" id="username"><?= $model->direccion ?></span>
                                              </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Telefono Principal </div>

                                              <div class="profile-info-value">
                                                <i class="fa fa-phone light-orange bigger-110"></i>
                                                <span class="editable" id="username"><?= $model->telefono ?></span>
                                              </div>
                                            </div>


                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Telefono Auxiliar </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= $model->otra_descripcion ?></span>
                                                </div>
                                              </div>



                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Fax </div>

                                                <div class="profile-info-value">
                                                  <i class="fa fa-fax light-orange bigger-110"></i>
                                                  <span class="editable" id="country"><?= $model->fax  ?></span>
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
                                  <i class="ace-icon fa fa-bookmark-o smaller-80 align-middle"></i>
                                  <b>Datos Adicionales</b>
                                </span>
                        </h4>

                        <div class="profile-user-info profile-user-info-striped">
                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> Contacto </div>

                                            <div class="profile-info-value">
                                              <span class="editable" id="username"><?= $model->responsable ?></span>
                                            </div>
                                          </div>

                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> Telefono Contacto </div>

                                            <div class="profile-info-value">
                                              <i class="fa fa-phone light-orange bigger-110"></i>
                                              <span class="editable" id="username"><?= $model->tlfcontact ?></span>
                                            </div>
                                          </div>


                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Observaciones </div>

                                              <div class="profile-info-value">
                                                <span class="editable" id="username"><?= $model->observacion ?></span>
                                              </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Estatus </div>

                                              <div class="profile-info-value">
                                                    <?php
                                                        echo $model->getStatusHtml();
                                                     ?>

                                              </div>
                                            </div>



                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Fecha de Vencimiento RNC </div>

                                              <div class="profile-info-value">
                                                <i class="fa fa-calendar light-orange bigger-110"></i>
                                                <span class="editable" id="country"><?= $model->fecha_rnc_vence  ?></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Fecha de Vencimiento RIF </div>

                                              <div class="profile-info-value">
                                                <i class="fa fa-calendar light-orange bigger-110"></i>
                                                <span class="editable" id="country"><?= $model->fecha_rif_vence  ?></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                              <div class="profile-info-name"> Fecha de Creación </div>

                                              <div class="profile-info-value">
                                                <i class="fa fa-calendar light-orange bigger-110"></i>
                                                <span class="editable" id="country"><?= $model->fechacreacion  ?></span>
                                                </div>
                                            </div>


                                          </div>




</div>
