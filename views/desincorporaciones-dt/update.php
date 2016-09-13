<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesDt */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Desincorporaciones Dt',
]) . ' ' . $model->cod;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Desincorporaciones Dts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="desincorporaciones-dt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
