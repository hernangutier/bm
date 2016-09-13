<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbEstados */

$this->title = 'Actualizar Estado: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Estados SUDEBIP', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-estados-update">

    		<div class="panel panel-primary">
      			<div class="panel-heading"><?= $this->title ?></div>
      				<div class="panel-body">
        				
    					<?= $this->render('_form', [
    					    'model' => $model,
    					]) ?>
      			</div>
    		</div>
</div>
