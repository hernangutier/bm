<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */

$this->title = Yii::t('app', 'Create Movimientos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Movimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
