<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion */

$this->title ='Datos de la Clasificación: '. $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificaciones Según Pub. 21'), 'url' => ['index']];
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
														<a href="<?= Url::to(['/clasificacion/index']) ?>">Calsificaciones Ségun Pub. 21</a>
													</li>


												</ul>
</div>
    <a href="<?= Url::to(['/clasificacion/update','id'=>$model->cod]) ?>" class="btn btn-primary">
    												<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
    												Actualizar
    </a>
</div>

  <h4 class="blue">
         <span class="label label-success arrowed-in arrowed-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  <b>Datos de la Clasificacón según Pub. 21</b>
         </span>
  </h4>

  <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                      <div class="profile-info-name">Descripción </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->descripcion ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Grupo </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->grupo ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Sub-Grupo </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->subgrupo ?></span>
                      </div>
                    </div>

                    <div class="profile-info-row">
                      <div class="profile-info-name"> Sección </div>

                      <div class="profile-info-value">
                        <span class="editable" id="username"><?= $model->seccion ?></span>
                      </div>
                    </div>




  </div>



</div>
