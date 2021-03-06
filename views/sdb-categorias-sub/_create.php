<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasSub */

$this->title = 'Crear Sub-Categoria (SUDEBIP) asociada a:' . $model->codgen0->codigo;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Guardar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
