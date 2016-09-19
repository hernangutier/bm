<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Bienes;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $form yii\widgets\ActiveForm */
/* @var $url yii\helpers\Url */
$this->title = Yii::t('app', 'Registrar Poliza');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
//------------- Variables de PHP a JavaScript -----
    $_POST['url']=Url::toRoute('/seguros/register','http');
    $_POST['urlfind']=Url::toRoute('/bienes/find','http');
    $_POST['idModel']=$model->cod;


  echo "<script>\n";
  echo "urlJs='".$_POST['url']."'\n";
  echo "urlJsFind='".$_POST['urlfind']."'\n";
  echo "idJs='".$_POST['idModel']."'\n";

  echo "</script>\n";

 ?>

<?php
    //----------- Eventos --------------
    //------------- Carga del Formulario ------------


    //---------- Click Agregar ---------
    $this->registerJs("
          $('#add').on('click',function(){
                var idbien=$('#select-bienes').val();
                //-------------- id Desincorporacion -----

                var idmodel=idJs;
                //--------  Implemetar Funcionalidad Ajax ----
                $.ajax({
                    type     :'POST',
                    cache    : false,
                    url  : urlJs,
                    data: {id: idmodel, idbien: idbien},
                    dataType: 'text',
                    success  : function(data) {
                       if (data=1){
                         $.pjax.reload({container:'#w2'});

                       } else {
                         alert('Error');
                       }

                    }
                    });









          });

    ")



 ?>



<div class="container">





    <?php $form = ActiveForm::begin(); ?>
    <h4 class="blue">
           <span class="label label-success arrowed-in-right">
              <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                    Seleccione el Bien
           </span>
    </h4>

    <?php //-------------- Aseguradoras -------------

         echo $form->field($model, 'codbien')->widget(Select2::classname(), [

           'data' =>ArrayHelper::map(Bienes::getListSqlActivesNoAsegurados(), 'cod', 'resultado'),
           'options' => ['placeholder' => 'Seleccione Bien ...',
                 'id'=>'select-bienes'
             ],
           'pluginOptions' => [
             'allowClear' => true
           ],
           'pluginEvents' => [
               "change" => 'function(e) {
                 e.preventDefault();
                 var id=$(this).val();
                 if ($(this).val()>0) {
                 $("#bienes").show();
                 $.ajax({
                     type     :"POST",
                     cache    : false,
                     url  : urlJsFind,
                     data: {id: id},
                     dataType: "json",
                     success  : function(data) {
                         $("#codigo").text(data.codigo);
                         $("#descripcion").text(data.descripcion);
                     }
                     });
                   } else {
                       $("#bienes").hide();

                   }





               }',

           ],
     ]);

      ?>


                                <div id="bienes">




                                <h4 class="blue">
                                         <span class="label label-primary arrowed-in-right">
                                            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                                  Datos del Bien
                                         </span>
                                  </h4>

                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                      <div class="profile-info-name">Código </div>

                                                      <div class="profile-info-value">
                                                        <span class="editable" id="codigo"><code>   <?= $model->cod ?></code></span>
                                                      </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                      <div class="profile-info-name"> Descripción </div>

                                                      <div class="profile-info-value">
                                                        <span class="editable" id="descripcion"><?= $model->cod ?></span>
                                                      </div>
                                                    </div>




                                  </div>
                              </div>
                              <br>



    <div class="tabbable">
                      <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                          <a data-toggle="tab" href="#home">
                            <i class="green ace-icon fa fa-cog "></i>
                            Datos Generales
                          </a>
                        </li>

                        <li>
                          <a data-toggle="tab" href="#messages">
                            <i class="blue ace-icon fa fa-code-fork "></i>
                            Detalles

                          </a>
                        </li>



                      </ul>

                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                          <?php
                              echo Yii::$app->controller->renderPartial('_basicos',['model'=>$model,'form'=>$form]);
                           ?>

                        </div>

                        <div id="messages" class="tab-pane fade">
                          <?php
                              echo Yii::$app->controller->renderPartial('_detalles',['model'=>$model,'form'=>$form]);
                           ?>

                        </div>




                      </div>
        </div>




    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
        <a href="<?= $url ?>" class="btn btn-white btn-default btn-round">
												<i class="ace-icon fa fa-times red2"></i>
												Cancelar
				</a>
    </div>



    <?php ActiveForm::end(); ?>

    </div>
