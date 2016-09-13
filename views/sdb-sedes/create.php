<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbSedes */

$this->title = 'Crear Sede';
$this->params['breadcrumbs'][] = ['label' => 'Administrar Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-sedes-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
