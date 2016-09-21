<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbMarcas */

$this->title = Yii::t('app', 'Crear Marca');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogo de Marcas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-marcas-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
