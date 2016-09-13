<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesDt */

$this->title = Yii::t('app', 'Create Desincorporaciones Dt');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Desincorporaciones Dts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desincorporaciones-dt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
