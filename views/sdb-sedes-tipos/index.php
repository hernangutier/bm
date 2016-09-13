<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbSedesTiposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo de Tipos de Lugares de Ubicación SUDEBIP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-sedes-tipos-index">

            <div class="panel panel-primary">
                  <div class="panel-heading">Catalogo de Tipos de Lugares de Ubicación SUDEBIP</div>
                      <div class="panel-body">
                        
    
        

    <p>
        <?= Html::a('Crear Tipo de Lugar de Ubicación SUDEBIP', ['create'], ['class' => 'btn btn-success']) ?>
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
