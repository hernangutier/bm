<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbMarcas */

$this->title = 'Actualizar datos de la Marca: ' . $model->denominacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogo de Marcas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
