<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbCategoriasGeneral */

$this->title = 'Crear Categoria General';
$this->params['breadcrumbs'][] = ['label' => 'Administrar Categorias Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



  				<?= $this->render('_form', [
        			'model' => $model,
    			]) ?>


			
