<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bovinos',
]) . ' ' . $model->cod;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bovinos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod, 'url' => ['view', 'id' => $model->cod]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bovinos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
