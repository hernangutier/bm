<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbCiudades */

$this->title = 'Crear Ciudad';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Ciudades SUDEBIP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-ciudades-create">

		<div class="panel panel-primary">
  			<div class="panel-heading">Crear Ciudad</div>
  				<div class="panel-body">
    		<?= $this->render('_form', [
    		    'model' => $model,
   		 		]) ?>

  			</div>
		</div>
</div>
