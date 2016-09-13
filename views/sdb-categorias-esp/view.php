<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasEsp */

$this->title = 'Datos de la Categoria Específica: ' . $model->codsub0->codigo . '-' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Sdb Categorias Esps', 'url' => ['index']];
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
  														<a href="<?= Url::to(['/sdb-categorias-sub/view','id'=>$model->codsub]) ?>">Ir atras..</a>
  													</li>


  												</ul>
  </div>
      <a href="<?= Url::to(['/sdb-categorias-esp/update','id'=>$model->cod]) ?>" class="btn btn-primary">
      												<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
      												Actualizar
      </a>
  </div>

<p>


  <h4 class="blue">
         <span class="label label-info arrowed-in arrowed-right">
            <i class="ace-icon fa   fa-angle-double-down  smaller-80 align-middle"></i>
                  <b>Categoria General (SUDEBIP): <?= $model->codsub0->codgen0->descripcion ?> </b>
         </span>
  </h4>

  <h4 class="blue">
         <span class="label label-info arrowed-in arrowed-right">
            <i class="ace-icon fa   fa-angle-double-down  smaller-80 align-middle"></i>
                  <b>Sub-Categoria (SUDEBIP): <?= $model->codsub0->descripcion  ?> </b>
         </span>
  </h4>
</p>
                      <h4 class="blue">
                             <span class="label label-success arrowed-in arrowed-right">
                                <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                      <b>Datos la Categoria Especifica (SUDEBIP)</b>
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
                                                <div class="profile-info-name"> Descripción </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="username"><?= $model->descripcion ?></span>
                                                </div>
                                              </div>







                                              </div>
