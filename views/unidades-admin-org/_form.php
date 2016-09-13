<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\UnidadesAdminOrg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidades-admin-org-form">





    <?php $form = ActiveForm::begin(); ?>


    <?php //-------------- Lineas -------------

       echo $form->field($model, 'codpadre')->widget(Select2::classname(), [

            'data' => ArrayHelper::map($model->getListUnidades(),'cod',
                 function($model, $defaultValue) {
                    return $model->descripcion;
            }
    ),
            'language' => 'es',

            'options' => ['placeholder' => 'Seleccione la Dependencia ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],

            ]);

    ?>



    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
