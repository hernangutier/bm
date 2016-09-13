<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BovinosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bovinos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bovinos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codbov',
            'fnac',
            'fcreacion',
            'sexo',
            'codraza',
            // 'codganaderia',
            // 'codcat_actual',
            // 'codcat_ingreso',
            // 'codcat_futura',
            // 'foto',
            // 'codrebano',
            // 'status:boolean',
            // 'tipo_ingreso',
            // 'fingreso',
            // 'peso_nacer',
            // 'cod',
            // 'codgrupo',
            // 'status_fisiologico',
            // 'programa_reproductivo',
            // 'color',
            // 'caracteristicas',
            // 'isdescartable:boolean',
            // 'parto_observaciones',
            // 'codpalp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
