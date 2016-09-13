<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbCategoriasSubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub-Categorias (SUDEBIP)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-categorias-sub-index">

    <p>
        <?= Html::a('Crear Sub-Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'codigo',
            'descripcion',
            [
                'attribute'=>'Categoria General',
                'value'=>'codgen0.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'codgen', ArrayHelper::map(app\models\SdbCategoriasGeneral::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Clasificacion']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
