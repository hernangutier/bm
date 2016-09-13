<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbSedesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Sedes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-sedes-index">

            <div class="panel panel-primary">
                  <div class="panel-heading">Administrar Sedes</div>
                      <div class="panel-body">
        
    
        

    <p>
        <?= Html::a('Crear  Sede', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'codigo',
            'descripcion',
            'localizacion',
            //'codpais',
            // 'otro_pais',
            // 'codparro',
            // 'codciudad',
            // 'otra_ciudad',
            // 'urbanizacion',
            // 'calle_av',
            // 'casa_edif',
            // 'piso',
            // 'tipo',
            // 'codest',
            // 'codmun',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

               
                  </div>
            </div>
</div>
