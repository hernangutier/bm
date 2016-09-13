<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesBm */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Anular Desincorporación N°: '. $model->ncontrol);

?>
<div class="container">



      <?php $form = ActiveForm::begin(); ?>

      <?php
                //--------------- MOtivo Anulación ------
                 echo $form->field($model, 'motivo_nulls')->textarea(['maxlength' => true]);

       ?>

       <div class="form-group">
           <?= Html::submitButton('Procesar' , ['class' =>  'btn btn-success' ]) ?>
       </div>
      <?php ActiveForm::end(); ?>




</div>
