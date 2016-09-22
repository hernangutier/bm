
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */



?>

<?php
    //-------------- Codigo para Desabilitar Cahe del Navegador -----
        $this->registerJs('
                    var path = "Test.aspx"; //write here name of your page
            history.pushState(null, null, path + window.location.search);
            window.addEventListener("popstate", function (event) {
                history.pushState(null, null, path + window.location.search);
            });
        ');

        $fieldOptions2 = [
            'options' => ['class' => 'block input-icon input-icon-right'],
            'inputTemplate' => "{input}<i class='ace-icon fa fa-lock'></i>"
        ];

 ?>

<div class="login-container">
							<div class="center">
                <h1>
                <i class="ace-icon fa fa-leaf green"></i>
                <span class="red">Ace</span>
                <span class="white" id="id-text2">Sistema de Bienes</span>
              </h1>

								<h4 class="blue" id="id-company-text"><?= $operacion ?></h4>
							</div>
              <?php $form = ActiveForm::begin(); ?>


              <?= $form
                          ->field($model->username, 'password', $fieldOptions2)
                          ->label(false)
                          ->passwordInput(['placeholder' => $pass->getAttributeLabel('password')])
              ?>

              <?= $form
                          ->field($model->password, 'password', $fieldOptions2)
                          ->label(false)
                          ->passwordInput(['placeholder' => $pass->getAttributeLabel('password')])
              ?>



                  <div class="form-group">
                      <div class="col-lg-offset-1 col-lg-11">
                          <?= Html::submitButton('Procesar', ['class' => 'width-35 pull-right btn btn-sm btn-primary', 'name' => 'login-button']) ?>
                      </div>
                  </div>

              <?php ActiveForm::end(); ?>


</div>
