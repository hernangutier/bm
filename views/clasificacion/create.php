<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion */

$this->title = Yii::t('app', 'Crear Clasificación');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificacions Según Pub. 21'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion-create">


					<?= $this->render('_form', [
        				'model' => $model,
    				]) ?>




</div>
