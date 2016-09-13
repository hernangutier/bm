<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */

$this->title = 'Actualizar Proveedor: ' . ' ' . $model->cedrif;
$this->params['breadcrumbs'][] = ['label' => 'Administrar Proveedores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedores-update">


        				<?= $this->render('_form', [
        					'model' => $model,
    					]) ?>
      			</div>
    	
