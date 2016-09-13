<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbCategoriasEspSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias Especificas (SUDEBIP)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-categorias-esp-index">


    <p>
        <?= Html::a('Crear Categoria Especifica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'codigo',
            'descripcion',
             [
                'attribute'=>'Sub-Categoria',
                'value'=>'codsub0.descripcion',
                'filter' => Html::activeDropDownList($searchModel,
                'codsub', ArrayHelper::map(app\models\SdbCategoriasSub::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Clasificacion']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>




</div>
