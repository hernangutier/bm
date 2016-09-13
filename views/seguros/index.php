<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SegurosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Seguros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seguros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Seguros'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cod',
            'codaseguradora',
            'otra_aseguradora',
            'npoliza',
            'monto',
            // 'tipo',
            // 'moneda',
            // 'especifique_moneda',
            // 'f_ini',
            // 'f_fin',
            // 'resp_civil',
            // 'tipo_cobertura',
            // 'especifique_tipo_cobertura',
            // 'descripcion_cobertura',
            // 'codbien',
            // 'active:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
