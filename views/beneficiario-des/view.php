<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\BeneficiarioDes */

$this->title = 'Datos del Beneficiario: '. $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Beneficiarios'), 'url' => ['index']];
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
                              <a href="<?= Url::to(['/beneficiario-des/index']) ?>">Beneficiarios</a>
                            </li>


                          </ul>
  </div>
      <a href="<?= Url::to(['/beneficiario-des/update','id'=>$model->cod]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
  </div>





  <h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Datos del Beneficiario
         </span>
  </h4>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">Cedula o Rif </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username">  <?= $model->cedrif ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Razon Social </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->razon?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Dirección </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->direccion?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Telefono </div>

                      <div class="profile-info-value">
                        <i class="fa fa-phone light-orange bigger-110"></i>
                        <span class="editable" id="username"><?= $model->telefono?></span>
                      </div>
                    </div>




  </div>



</div>
