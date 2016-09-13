<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\Responsables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-form">


	<?php //-------------- Contactos -------------

       echo $form->field($model, 'codunidad')->widget(Select2::classname(), [

            'data' => ArrayHelper::map(app\models\UnidadesAdmin::find()->all(),'cod',
                 function($model, $defaultValue) {
                    return $model->codigo . ' ' .$model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione Unidad de Adscripción ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>

    <?= $form->field($model, 'tipo')->dropDownList(
                    ['D'=>'Administrativo',
                    'U'=>'Usuario Directo',
                    'C'=>'Cuido',
                    ]
                  )


    ?>


    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
		<?php

          echo  $form->field($model, 'activo')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                            'onText' => 'Habilitado',
                            'offText' => 'Inhabilitado',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                    ]

            ]);

    ?>





</div>
