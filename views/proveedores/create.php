<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */

$this->title = 'Crear Proveedor';
$this->params['breadcrumbs'][] = ['label' => 'Administrar Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

              <?= $this->render('_form', [
        					'model' => $model,
    					]) ?>
