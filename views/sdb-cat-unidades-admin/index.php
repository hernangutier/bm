<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbCatUnidadesAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo Categorias Unidades Administrativas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-cat-unidades-admin-index">


    <p>
        <?= Html::a('Crear Categoria de Unidad Administrativa', ['create'], ['class' => 'btn btn-success']) ?>
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
</div>
