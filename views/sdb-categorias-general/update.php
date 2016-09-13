<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasGeneral */

$this->title = 'Actualizar Categoria General: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Administrar Categorias Generales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = 'Actualizar Categoria General: '. $model->codigo;
?>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
