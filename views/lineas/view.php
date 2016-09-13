<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Lineas */

$this->title = 'Datos de la Linea: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Lineas', 'url' => ['index']];
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
                              <a href="<?= Url::to(['/lineas/index']) ?>">Lineas</a>
                            </li>


                          </ul>
  </div>
      <a href="<?= Url::to(['/lineas/update','id'=>$model->cod]) ?>" class="btn btn-primary">
                              <i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
                              Actualizar
      </a>
  </div>





  <h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                  Datos de la Linea
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



</div>
