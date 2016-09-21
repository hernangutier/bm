<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbModelos */

$this->title = 'Actualizar Modelo: ' . $model->descripcion . ' Asignado a la Marca: ' . $model->codmarca0->denominacion;



$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-modelos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
