<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use  yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $form yii\widgets\ActiveForm */
/* @var $url yii\helpers\Url */

?>



    <?php $form = ActiveForm::begin(); ?>


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
                                                            <span class="editable" id="codigo"><h4 class="text-primary">    <?= $model->codbien0->codigo ?></h4></span>
                                                          </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                          <div class="profile-info-name"> Descripción </div>

                                                          <div class="profile-info-value">
                                                            <span class="editable" id="descripcion"><?= $model->codbien0->descripcion ?></span>
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
