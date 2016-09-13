<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LineasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Lineas de Bienes';
$this->params['breadcrumbs'][] = $this->title;
?>

    <p>
        <?= Html::a('Crear Linea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'codigo',
            'descripcion',



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
