<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasEsp */

$this->title = 'Actualizar Categoria Especifica: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Sdb Categorias Esps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sdb-categorias-esp-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
