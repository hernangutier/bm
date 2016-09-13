<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadesAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <div class="tabbable">

                      <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                          <a data-toggle="tab" href="#home">
                            <i class="green ace-icon fa fa-cog "></i>
                            Datos Principales
                          </a>
                        </li>

                        <li>
                          <a data-toggle="tab" href="#messages">
                            <i class="blue ace-icon fa fa-code-fork "></i>
                            Ubicación

                          </a>
                        </li>

                  </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <?php
            echo Yii::$app->controller->renderPartial('basicos',['model'=>$model,'form'=>$form]);
         ?>

      </div>

      <div id="messages" class="tab-pane fade">
        <?php
            echo Yii::$app->controller->renderPartial('ubicacion',['model'=>$model,'form'=>$form]);
         ?>

      </div>




    </div>

    </div>




    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>
  </div>

    <?php ActiveForm::end(); ?>

</div>
