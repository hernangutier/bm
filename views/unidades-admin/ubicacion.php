<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadesAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidades-admin-form">



	<?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>

	<?php //-------------- Contactos -------------

       echo $form->field($model, 'codsede')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(app\models\SdbSedes::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Sede ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>
    <?php //-------------- Contactos -------------

       echo $form->field($model, 'codresp')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(app\models\Responsables::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->nombres . '  ' .$model->apellidos;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione el Encargado ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>


		<?php

          echo  $form->field($model, 'disponible_inc')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Si',
                            'offText' => 'No',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>







</div>
