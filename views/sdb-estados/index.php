<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbEstadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo de Estados SUDEBIP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-estados-index">

            <div class="panel panel-primary">
                  <div class="panel-heading">Catalogo de Estados SUDEBIP</div>
                      <div class="panel-body">
        
    
        

    <p>
        <?= Html::a('Crear Estado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'codigo',
            'descripcion',
            [
                'attribute'=>'Pais',
                'value'=>'codpais0.descripcion',
                'filter' => Html::activeDropDownList($searchModel, 
                'codpais', ArrayHelper::map(app\models\SdbPaises::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Pais']),
            ],  
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
                
                  </div>
            </div>
</div>
