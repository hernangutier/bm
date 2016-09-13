<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bienes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cod')->textInput() ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_ing')->textInput() ?>

    <?= $form->field($model, 'dias_garantia')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'notasigned')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isvehicle')->textInput() ?>

    <?= $form->field($model, 'codvehicle')->textInput() ?>

    <?= $form->field($model, 'foto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cod_und_actual')->textInput() ?>

    <?= $form->field($model, 'isasigned')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codclas')->textInput() ?>

    <?= $form->field($model, 'fcreacion')->textInput() ?>

    <?= $form->field($model, 'coduser')->textInput() ?>

    <?= $form->field($model, 'operativo')->textInput() ?>

    <?= $form->field($model, 'tipobien')->textInput() ?>

    <?= $form->field($model, 'codlin')->textInput() ?>

    <?= $form->field($model, 'localizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fdesinc')->textInput() ?>

    <?= $form->field($model, 'pendientedesinc')->textInput() ?>

    <?= $form->field($model, 'undmedida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aplicaiva')->textInput() ?>

    <?= $form->field($model, 'existe')->textInput() ?>

    <?= $form->field($model, 'codcat')->textInput() ?>

    <?= $form->field($model, 'statusfisical')->textInput() ?>

    <?= $form->field($model, 'disponibilidad')->textInput() ?>

    <?= $form->field($model, 'foto1')->textInput() ?>

    <?= $form->field($model, 'mantenimiento')->textInput() ?>

    <?= $form->field($model, 'estado_uso')->textInput() ?>

    <?= $form->field($model, 'estado_fisico')->textInput() ?>

    <?= $form->field($model, 'old_cod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
