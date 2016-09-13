<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */

$this->title = Yii::t('app', 'Create Bovinos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bovinos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
