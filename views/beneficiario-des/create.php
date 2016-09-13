<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BeneficiarioDes */

$this->title = Yii::t('app', 'Crear Beneficiario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Beneficiario Des'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
