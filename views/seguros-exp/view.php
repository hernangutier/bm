<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SegurosExp */

$this->title = $model->cod;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seguros Exps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seguros-exp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->cod], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->cod], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod',
            'codseg',
            'file',
        ],
    ]) ?>

</div>
