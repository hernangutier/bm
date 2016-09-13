<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimientos-form">
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
  <div class="desincorporaciones-bm-form">


    <div class="widget-box">
    									<div class="widget-header widget-header-blue widget-header-flat"><h4>Traslado de Bienes entre Oficinas</h4>

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
    														<li data-step="1" class="active">
    															<span class="step">1</span>
    															<span class="title">Datos de las Unidades Involucradas</span>
    														</li>

    														<li data-step="2">
    															<span class="step">2</span>
    															<span class="title">Asignar los Bienes</span>
    														</li>

                                <li data-step="2">
    															<span class="step">2</span>
    															<span class="title">Procesar</span>
    														</li>




    													</ul>
    												</div>

    												<hr>

    												<div class="step-content pos-rel">
    													<div class="step-pane active" data-step="1">
    														<h3 class="lighter block green">Movimiento N°: <?= $model->ncontrol ?>  </h3>
                              <?php $form = ActiveForm::begin(); ?>
                                <div class="container">


                                <?= $form->field($model,'fecha')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Ingrese Fecha del Movimiento ...'],
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format'=>'yyyy-mm-dd',
                                ]
                                ])
                                ?>

                                <?=
                                    $form->field($model, 'codund_origen')->widget(Select2::classname(), [
                                          'data' => ArrayHelper::map(app\models\UnidadesAdmin::find()->asArray()->all(), 'cod', 'descripcion'),
                                          'options' => ['placeholder' => 'Seleccione la Unidad de Origen ...'],
                                          'pluginOptions' => [
                                              'allowClear' => true
                                          ],
                                        ]);
                                ?>

                                <?=
                                    $form->field($model, 'codund_destino')->widget(Select2::classname(), [
                                          'data' => ArrayHelper::map(app\models\UnidadesAdmin::find()->asArray()->all(), 'cod', 'descripcion'),
                                          'options' => ['placeholder' => 'Seleccione la Unidad de Destino ...'],
                                          'pluginOptions' => [
                                              'allowClear' => true
                                          ],
                                        ]);
                                ?>

                                <?= $form->field($model, 'estado_uso')->dropDownList(
                                                ['6'=>'En proceso de disposición',
                                                 '7'=>'En Desuso por Obsolecencia',
                                                 '8'=>'En Desuso por Inservibilidad',
                                                 '9'=>'En Desuso por Obsolecencia e Inservibilidad',


                                                ]
                                              )


                                ?>


                                </div>

                            </div>


    											<hr>
    											<div class="wizard-actions">


    												<button class="btn btn-success btn-next" data-last="Finish">
    													Guardar y Siguiente
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




</div>
