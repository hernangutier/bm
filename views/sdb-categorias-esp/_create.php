<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasEsp */

$this->title = 'Crear Categoria Especifica (SUDEBIP) asociada a:' . $model->codsub0->codigo . '-0000';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
  <h4 class="blue">
         <span class="label label-success arrowed-in-right">
            <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                <b><?= $model->codsub0->descripcion  ?></b>
         </span>
  </h4>
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>




    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
