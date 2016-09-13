<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbCiudadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo de Ciudades SUDEBIP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-ciudades-index">

            <div class="panel panel-primary">
                  <div class="panel-heading">Catalogo de Ciudades SUDEBIP</div>
                      <div class="panel-body">
        

    <p>
        <?= Html::a('Crear  Ciudad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            
            
            'codigo',
            'descripcion',
            [
                'attribute'=>'Municipio',
                'value'=>'codmun0.descripcion',
                'filter' => Html::activeDropDownList($searchModel, 
                'codmun', ArrayHelper::map(app\models\SdbMunicipios::find()->asArray()->all(),
                'cod', 'descripcion'),['class'=>'form-control','prompt' => 'Filtrar por Municipio']),
            ],    

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

                
                  </div>
            </div>
</div>
