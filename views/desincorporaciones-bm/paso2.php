<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesBm */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//------------- Variables de PHP a JavaScript -----
    $_POST['url']=Url::toRoute('/bienes/add-detalle','http');
    $_POST['urlfind']=Url::toRoute('/bienes/find','http');
    $_POST['idModel']=$model->cod;
    $_POST['count']=$model->getDesincorporacionesDts()->count();

  echo "<script>\n";
  echo "urlJs='".$_POST['url']."'\n";
  echo "urlJsFind='".$_POST['urlfind']."'\n";
  echo "idJs='".$_POST['idModel']."'\n";
  echo "countJs='".$_POST['count']."'\n";
  echo "</script>\n";





    //----------- Eventos --------------
    //------------- Carga del Formulario ------------
    $this->registerJs('
$(document).ready(function() {
  if ($("#select-bienes").val()<2)  {
    if (countJs>0){
        $("#btn-sig").attr("disabled",false);
    } else {
        $("#btn-sig").attr("disabled",true);
    }
    $("#bienes").hide();
}
});');





 ?>


<div class="desincorporaciones-bm-form">


  <div class="widget-box">
  									<div class="widget-header widget-header-blue widget-header-flat">
  										<h4 class="widget-title lighter">Asignar Bienes a Desincorporacion N°: <?php echo $model->ncontrol  ?></h4>

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
  														<li data-step="1" class="complete" >
  															<span class="step">1</span>
  															<span class="title">Registrar la Desincorporación</span>
  														</li>

  														<li data-step="2" class="active">
  															<span class="step">2</span>
  															<span class="title">Cargar los Bienes</span>
  														</li>

  														<li data-step="3">
  															<span class="step">3</span>
  															<span class="title">Preparar para Enviar</span>
  														</li>


  													</ul>
  												</div>

  												<hr>

  												<div class="step-content pos-rel">
  													<div class="step-pane active" data-step="2">

                                <?php $form = ActiveForm::begin(); ?>
                              <div class="container">

                                    <?php
                                        echo Yii::$app->controller->renderPartial('_paso2',['model'=>$model,'form'=>$form]);
                                     ?>

                              </div>

                          </div>


  											<hr>
  											<div class="wizard-actions">
  												<a href="<?= Url::to(['paso1','id'=>$model->cod]) ?>" class="btn btn-prev">
  													<i class="ace-icon fa fa-arrow-left"></i>
  													Previo
  												</a>

  												<a href="<?= Url::to(['paso3','id'=>$model->cod])  ?>" id="btn-sig" class="btn btn-success btn-next" data-last="Finish">
  													Siguiente
  													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
  												</a>
  											</div>


















    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
