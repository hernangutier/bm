<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasEsp */

$this->title = 'Crear Categoria Especifica';
$this->params['breadcrumbs'][] = ['label' => 'Categorias Especificas (SUDEBIP)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    					<?= $this->render('_form', [
    					    'model' => $model,
    					]) ?>
