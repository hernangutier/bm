
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\LoginForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm
*/



?>

<?php
    //-------------- Codigo para Desabilitar Cahe del Navegador -----

        $fieldOptions1 = [
        'options' => ['class' => 'form-group has-feedback'],
        'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
        ];

        $fieldOptions2 = [
            'options' => ['class' => 'block input-icon input-icon-right'],
            'inputTemplate' => "{input}<i class='ace-icon fa fa-lock'></i>"
        ];

 ?>

 <div class="main-container">
     <div class="main-content">
       <div class="row">
         <div class="col-sm-12 col-sm-offset-1">
           <div class="login-container">
             <div class="center">
               <h1>
                 <i class="ace-icon fa fa-leaf green"></i>
                 <span class="red">Axus</span>
                 <span class="grey" id="id-text2">-Bienes</span>
               </h1>
               <h4 class="blue" id="id-company-text">&copy; Procuraduria General del Estado Barinas</h4>
               <div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												ingrese sus credenciales...
											</h4>

											<div class="space-6"></div>

                      <?php $form = ActiveForm::begin(); ?>

                      <?= $form
                          ->field($model, 'email', $fieldOptions1)
                          ->label(false)
                          ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

                      <?= $form
                          ->field($model, 'password', $fieldOptions2)
                          ->label(false)
                          ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>


                <div class="space"></div>

                <div class="clearfix">
                    <?= Html::submitButton('<i class="ace-icon fa fa-key"></i> <span class="bigger-110">Entrar</span>', ['class' => 'width-35 pull-right btn btn-sm btn-primary', 'name' => 'login-button']) ?>
                </div>




                      <?php ActiveForm::end(); ?>



             </div>
        </div>
        <div class="toolbar clearfix">
                <div>
                  <a href="#" data-target="#forgot-box" class="forgot-password-link">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    Recuperar passsword...
                  </a>
                </div>

                <div>
                  <a href="<?= Url::to(['site/signup']) ?>" data-target="#signup-box" class="user-signup-link">
                    Registrarme...
                    <i class="ace-icon fa fa-arrow-right"></i>
                  </a>
                </div>
          </div>
    </div>

</div>

</div>

</div>
</div>
</div>
</div>
</div>
