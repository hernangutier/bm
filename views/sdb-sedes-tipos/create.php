<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbSedesTipos */

$this->title = 'Crear Tipo de Lugar de Ubicación SUDEBIP';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Tipos de Lugares de Ubicación SUDEBIP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-sedes-tipos-create">

  		<div class="panel panel-primary">
    			<div class="panel-heading">Crear Tipo de Lugar de Ubicación SUDEBIP</div>
    				<div class="panel-body">
    			<?= $this->render('_form', [
    			    'model' => $model,
    			]) ?>

    			</div>
  		</div>
</div>
