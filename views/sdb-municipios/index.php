<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbMunicipiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo de Municipios SUDEBIP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-municipios-index">

            <div class="panel panel-primary">
                  <div class="panel-heading">Catalogo de Municipios SUDEBIP</div>
                      <div class="panel-body">
        
    
        

    <p>
        <?= Html::a('Crear  Municipio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            
            'codigo',
            'descripcion',
            [
                'attribute'=>'Estado',
                'value'=>'codest0.descripcion',
                'filter' => Html::activeDropDownList($searchModel, 
                'codest', ArrayHelper::map(app\models\SdbEstados::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Estado']),
            ],  
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
                
                  </div>
            </div>
</div>
