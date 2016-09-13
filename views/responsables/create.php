<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responsables */

$this->title = 'Crear Usuario Responsable';
$this->params['breadcrumbs'][] = ['label' => 'Administrar Usuarios Responsables', 'url' => ['index']];

?>

					<?= $this->render('_form', [
    				    'model' => $model,
    				]) ?>

	
