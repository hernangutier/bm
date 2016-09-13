<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdbPaises */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Pais',
]) . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogo de Paises SUDEBIP'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', $this->title)
?>
<div class="sdb-paises-update">

    <div class="panel panel-primary">
      			<div class="panel-heading"><?= $this->title ?> </div>
      				<div class="panel-body">
    					<?= $this->render('_form', [
    					    'model' => $model,
    					]) ?>
		</div>
    </div>

</div>
