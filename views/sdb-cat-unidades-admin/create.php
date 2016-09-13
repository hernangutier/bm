<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbCatUnidadesAdmin */

$this->title = 'Crear Categoria de Unidad Administrativa';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo de Unidades Administrativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
