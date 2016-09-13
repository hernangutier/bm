<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbParroquias */

$this->title = 'Crear  Parroquia';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Parroquias SUDEBIP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-parroquias-create">

 		<div class="panel panel-primary">
      			<div class="panel-heading">Crear Parroquia</div>
      				<div class="panel-body">
    					<?= $this->render('_form', [
    					    'model' => $model,
    					]) ?>
				
      			</div>
    		</div>
</div>
