<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasSub */

$this->title = 'Crear Sub-Categoria (SUDEBIP)';
$this->params['breadcrumbs'][] = ['label' => 'Sub-Categorias (SUDEBIP)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



        				<?= $this->render('_form', [
        					'model' => $model,
    					]) ?>
