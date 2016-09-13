<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbSeguros */

$this->title = 'Crear Seguro';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Seguros SUDEBIP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-seguros-create">

		<div class="panel panel-primary">
  			<div class="panel-heading">Crear Seguro</div>
  				<div class="panel-body">
					<?= $this->render('_form', [
    				    'model' => $model,
    				]) ?>
		</div>
	</div>
</div>
