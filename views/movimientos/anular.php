<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Anular Movimientos N°: ' . $model->ncontrol);

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">





    <?php $form = ActiveForm::begin(); ?>

    <h4 class="blue">
       <span class="label label-warning arrowed-in arrowed-right">
          <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                <b>Movimiento a anular....</b>
       </span>
</h4>



      <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                          <div class="profile-info-name">Fecha de la Transaccción </div>

                          <div class="profile-info-value">
                            <span class="editable" id="username">   <?= $model->fecha ?></span>
                          </div>
                        </div>
                        <div class="profile-info-row">
                          <div class="profile-info-name"> Tipo </div>

                          <div class="profile-info-value">
                            <span class="editable" id="username"><?= $model->getTipo() ?></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Origen de los Bienes </div>

                          <div class="profile-info-value">
                            <span class="editable" id="username"><?= is_null($model->codundOrigen) ? 'No Aplica': $model->codundOrigen->descripcion ?></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Destino de los Bienes </div>

                          <div class="profile-info-value">
                            <span class="editable" id="username"><?=  is_null($model->codundDestino) ? 'No Aplica': $model->codundDestino->descripcion ?></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Responsable Anterior </div>

                          <div class="profile-info-value">
                            <span class="editable" id="username"><?= is_null($model->coduserOrigen) ? 'No Aplica': $model->coduserOrigen->getNombreCompleto() ?></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Nuevo Responsable de los Bienes </div>

                          <div class="profile-info-value">
                            <span class="editable" id="username"><?= is_null($model->coduserDestino) ? 'No Aplica': $model->coduserDestino->getNombreCompleto() ?></span>
                          </div>
                        </div>

    </div>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Procesar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
