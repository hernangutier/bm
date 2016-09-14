<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbSegurosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo de Seguros SUDEBIP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">








    <p>
        <?= Html::a('Crear Seguro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            'razon',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
