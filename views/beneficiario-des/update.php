<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BeneficiarioDes */

$this->title = Yii::t('app', 'Actualizar Beneficiario: ', [
    'modelClass' => 'Beneficiario Des',
]) . ' ' . $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Beneficiarios '), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
?>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
