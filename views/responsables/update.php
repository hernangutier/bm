<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Responsables */

$this->title = 'Actualizar Usuario Responsable: ' . ' ' . $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => 'Administrar Usuarios Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    	<?= $this->render('_form', [
        	'model' => $model,
    	]) ?>
	
