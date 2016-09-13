<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClasificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clasificaciones Ségun Pub. 21');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion-index">





    <p>
        <?= Html::a(Yii::t('app', 'Crear Clasificacion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'descripcion',
            'grupo',
            'subgrupo',
            'seccion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
