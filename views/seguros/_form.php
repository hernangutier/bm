<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>

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
    </div>

    <?php ActiveForm::end(); ?>
