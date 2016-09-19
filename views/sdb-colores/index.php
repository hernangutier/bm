<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SdbColoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Catalogo Colores (SUDEBIP)');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">


    <p>
        <?= Html::a(Yii::t('app', 'Crear Color (SUDEBIP)'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'codigo',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',

                 //--------- Actualizar ---
             
            ],
        ],
    ]); ?>

</div>
