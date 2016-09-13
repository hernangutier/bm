<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MovimientosDt */

$this->title = Yii::t('app', 'Create Movimientos Dt');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Movimientos Dts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-dt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
