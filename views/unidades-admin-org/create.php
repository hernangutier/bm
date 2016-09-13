<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UnidadesAdminOrg */

$this->title = Yii::t('app', 'Registrar Relación de Adscripción de: ' . $model->codhijo0->descripcion);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidades Administrativas '), 'url' => ['/unidades-admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
