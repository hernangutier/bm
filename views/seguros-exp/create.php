<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SegurosExp */

$this->title = Yii::t('app', 'Adjuntar Archivo a Expediente Digital de la Poliza: '. $model->codseg0->npoliza );
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
