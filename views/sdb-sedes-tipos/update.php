<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedesTipos */

$this->title = 'Actualizar Tipo de Lugar de Ubicación SUDEBIP: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Tipos de Lugares de Ubicación SUDEBIP', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-sedes-tipos-update">

    		<div class="panel panel-primary">
      			<div class="panel-heading">Actualizar</div>
      				<div class="panel-body">
    			<?= $this->render('_form', [
    			    'model' => $model,
    			]) ?>
   
      			</div>
    		</div> 			

</div>
