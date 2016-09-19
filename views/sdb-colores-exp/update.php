<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbColores */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sdb Colores',
]) . ' ' . $model->cod;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sdb Colores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sdb-colores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
