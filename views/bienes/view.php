<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bienes */

$this->title = $model->cod;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-view">

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
            'codigo',
            'serial',
            'cod_ing',
            'dias_garantia',
            'codresp_directo',
            'status',
            'costo',
            'notasigned',
            'observacion',
            'isvehicle',
            'codvehicle',
            'foto:ntext',
            'cod_und_actual',
            'isasigned',
            'descripcion:ntext',
            'marca',
            'codclas',
            'fcreacion',
            'coduser',
            'operativo',
            'tipobien',
            'codlin',
            'localizacion',
            'fdesinc',
            'pendientedesinc',
            'undmedida',
            'aplicaiva',
            'existe',
            'codcat',
            'statusfisical',
            'disponibilidad',
            'foto1',
            'mantenimiento',
            'estado_uso',
            'estado_fisico',
            'old_cod',
            'activo',
            'is_colectivo:boolean',
        ],
    ]) ?>

</div>
