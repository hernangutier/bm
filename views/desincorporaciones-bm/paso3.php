<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesBm */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="desincorporaciones-bm-form">


  <div class="widget-box">
  									<div class="widget-header widget-header-blue widget-header-flat">
  										<h4 class="widget-title lighter">Preparar para Enviar</h4>

  										<div class="widget-toolbar">
  											<label>
  												<small class="green">
  													<b>Periodo</b>
  												</small>

  												<h4>2016-I</h4>
  												<span class="lbl middle"></span>
  											</label>
  										</div>
  									</div>

  									<div class="widget-body">
  										<div class="widget-main">
  											<div id="fuelux-wizard-container">
  												<div>
  													<ul class="steps">
  														<li data-step="1"  class="complete" >
  															<span class="step" >1</span>
  															<span class="title">Registrar la Desincorporación</span>
  														</li>

  														<li data-step="2" class="complete">
  															<span class="step" >2</span>
  															<span class="title">Cargar los Bienes</span>
  														</li>

  														<li data-step="3" class="active">
  															<span class="step">3</span>
  															<span class="title">Preparar para Enviar</span>
  														</li>


  													</ul>
  												</div>

  												<hr>

  												<div class="step-content pos-rel">
  													<div class="step-pane active" data-step="3">
  														<h3 class="lighter block green">Preparar para Enviar Desincorporación N°:  <?= $model->ncontrol ?>  </h3>
                                <?php $form = ActiveForm::begin(); ?>
                              <div class="container">


                                <?php
                                    echo Yii::$app->controller->renderPartial('scenario',['model'=>$model,'form'=>$form]);
                                 ?>


                              </div>

                          </div>


  											<hr>
  											<div class="wizard-actions">
  												<button disabled="disabled" class="btn btn-prev">
  													<i class="ace-icon fa fa-arrow-left"></i>
  													Atras
  												</button>

  												<button class="btn btn-success btn-next" data-last="Finish">
  													Enviar a Revisión
  													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
  												</button>
  											</div>






    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>
</div>
