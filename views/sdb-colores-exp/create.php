<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbColores */

$this->title = Yii::t('app', 'Create Sdb Colores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sdb Colores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-colores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
