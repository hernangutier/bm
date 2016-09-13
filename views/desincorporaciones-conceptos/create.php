<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DesincorporacionesConceptos */

$this->title = Yii::t('app', 'Create Desincorporaciones Conceptos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Desincorporaciones Conceptos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desincorporaciones-conceptos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
