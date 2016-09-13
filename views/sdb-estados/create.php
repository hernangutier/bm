<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbEstados */

$this->title = 'Crear Estado';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Estados SUDEBIP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-estados-create">

    		<div class="panel panel-primary">
      			<div class="panel-heading">Crear Estado</div>
      				<div class="panel-body">
        
    					<?= $this->render('_form', [
    					    'model' => $model,
    					]) ?>
				
      			</div>
    		</div>
</div>
