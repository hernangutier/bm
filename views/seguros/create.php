<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Seguros */
/* @var $url yii\helpers\Url */

$this->title = Yii::t('app', 'Actualizar Poliza a: ' . $model->codbien0->codigo);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,'url'=>$url,
    ]) ?>

</div>
