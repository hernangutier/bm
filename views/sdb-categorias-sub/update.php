<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasSub */

$this->title = 'Actualizar Sub-Cateoria: ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Administrar Sub-Categorias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = 'Actualizar Sub-Cateoria: '  . $model->codigo ;
?>

        				<?= $this->render('_form', [
        					'model' => $model,
    					]) ?>
      		
