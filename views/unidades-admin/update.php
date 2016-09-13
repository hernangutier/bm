<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadesAdmin */

$this->title = 'Actualizar Unidad Administrativa: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Unidades Administrativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

   				<?= $this->render('_form', [
    			    'model' => $model,
    			]) ?>
