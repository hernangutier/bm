<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbColores */

$this->title = 'Actualizar Color (SUDEBIP): ' . $model->descripcion ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogo de Colores (SUDEBIP)'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
