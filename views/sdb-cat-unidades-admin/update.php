<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCatUnidadesAdmin */

$this->title = 'Actualizar Unidad Administrativa: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Unidades Administrativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-cat-unidades-admin-update">


    	<?= $this->render('_form', [
        'model' => $model,
    	]) ?>
</div>
