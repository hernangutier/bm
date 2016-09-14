<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSeguros */

$this->title = 'Actualizar Seguro: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Seguros SUDEBIP', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


    			<?= $this->render('_form', [
    			    'model' => $model,
   			 	]) ?>
		
</div>
