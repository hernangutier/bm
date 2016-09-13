<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Clasificación: ',
]) . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificaciones Según Pub. 21'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion-update">


					<?= $this->render('_form', [
    				    'model' => $model,
    				]) ?>
	
</div>
