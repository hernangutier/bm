<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbMunicipios */

$this->title = 'Actualizar Municipio: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Municipios SUDEBIP', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-municipios-update">

    		<div class="panel panel-primary">
      			<div class="panel-heading">Actualizar</div>
      				<div class="panel-body">
        
    						<?= $this->render('_form', [
    						    'model' => $model,
    						]) ?>
			
      			</div>
    		</div>
</div>
