<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $url yii\helpers\Url */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Poliza: ',
]) . ' ' . $model->npoliza;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seguros'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,'url'=>$url,
    ]) ?>

</div>
