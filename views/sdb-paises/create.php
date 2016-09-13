<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbPaises */

$this->title = Yii::t('app', 'Crear Pais');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogo de Paises SUDEBIP'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sdb-paises-create">

    <div class="panel panel-primary">
      			<div class="panel-heading">Crear Pais</div>
      				<div class="panel-body">
    				<?= $this->render('_form', [
    				    'model' => $model,
    				]) ?>
		</div>
    </div>
</div>
