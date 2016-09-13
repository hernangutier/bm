<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedes */

$this->title = 'Update Sdb Sedes: ' . ' ' . $model->cod;
$this->params['breadcrumbs'][] = ['label' => 'Sdb Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sdb-sedes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
