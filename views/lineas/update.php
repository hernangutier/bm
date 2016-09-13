<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lineas */

$this->title = 'Actualizar Linea: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Administrar Lineas de Bienes', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class='container '>
  <?= $this->render('_form', [
      'model' => $model,
  ]) ?>


</div>
