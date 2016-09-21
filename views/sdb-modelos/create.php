<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdbModelos */

$this->title = Yii::t('app', 'Create Sdb Modelos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sdb Modelos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
