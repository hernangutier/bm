<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbColores */

$this->title = Yii::t('app', 'Crear Color (SUDEBIP)');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogo de olores (SUDEBIP)'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
