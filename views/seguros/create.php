<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seguros */

$this->title = Yii::t('app', 'Actualizar Poliza a: ' . $model->codbien0->codigo);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
