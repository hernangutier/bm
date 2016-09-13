<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbPaisesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo de Paises SUDEBIP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-paises-index">

   <div class="panel panel-primary">
                 <div class="panel-heading">Catalogo de Paises SUDEBIP</div>
                     <div class="panel-body">
   
   

    <p>
        <?= Html::a(Yii::t('app', 'Crear Pais'), ['create'], ['class' => 'btn btn-success']) ?>
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
   </div>
</div>
