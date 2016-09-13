<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCiudades */

$this->title = 'Actualizar Ciudad: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Ciudades', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-ciudades-update">

		<div class="panel panel-primary">
  			<div class="panel-heading">Actualizar</div>
  				<div class="panel-body">
    				<?= $this->render('_form', [
    				    'model' => $model,
    				]) ?>
			
  			</div>
		</div>
</div>
