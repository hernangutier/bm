<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SdbPaises */

$this->title = $model->cod;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogo de Paises SUDEBIP'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-paises-view">

    

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'descripcion',
        ],
    ]) ?>

</div>
