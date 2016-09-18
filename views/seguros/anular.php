<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $form ActiveForm */

$this->title = Yii::t('app', 'Anular Poliza N°: ' . $model->npoliza);

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">

    <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

          <div class="form-group">
              <?= Html::submitButton('<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Procesar', ['class' => 'btn btn-white btn-info btn-bold']) ?>
          </div>
    <?php ActiveForm::end(); ?>

</div><!-- anular -->
