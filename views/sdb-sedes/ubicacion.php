<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SdbSedes */
/* @var $form yii\widgets\ActiveForm */

//--------- Ubicacion de la sedes segun datos de SUDEBIP ---
?>

<div class="sdb-sedes-form">

   <?= Html::csrfMetaTags() ?> 
   <?= $form->field($model, 'codpais')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(app\models\SdbPaises::find()->asArray()->all(), 'cod', 'descripcion')
    ]); ?>

    

    <?= $form->field($model, 'otro_pais')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'codest')->widget(DepDrop::classname(), [
    //'data'=> [6=>'Bank'],
    //'options' => ['placeholder' => 'Seleccione Estado'],
    'type' => DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        
        'depends'=>[Html::getInputId($model, 'codpais')],
        'url' => Url::to(['estados']),
        'loadingText' => 'Cargando Estados',
        
    ]
    ]); ?>


    

    <?= $form->field($model, 'codmun')->widget(DepDrop::classname(), [
    //'data'=> [6=>'Bank'],
    //'options' => ['placeholder' => 'Seleccione Estado'],
    'type' => DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'placeholder' => false,
        'depends'=>[Html::getInputId($model, 'codest')],
        'url' => Url::to(['municipios']),
        'loadingText' => 'Cargando municipios',
        
    ]
    ]); ?>

    <?= $form->field($model, 'codparro')->widget(DepDrop::classname(), [
    //'data'=> [6=>'Bank'],
    //'options' => ['placeholder' => 'Seleccione Estado'],
    'type' => DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        
        'depends'=>[Html::getInputId($model, 'codmun')],
        'url' => Url::to(['parroquias']),
        'loadingText' => 'Cargando Parroquias',
        
    ]
    ]); ?>

    <?= $form->field($model, 'codciudad')->widget(DepDrop::classname(), [
    //'data'=> [6=>'Bank'],
    //'options' => ['placeholder' => 'Seleccione Estado'],
    'type' => DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        
        'depends'=>[Html::getInputId($model, 'codmun')],
        'url' => Url::to(['ciudades']),
        'loadingText' => 'Cargando Ciudades',
        
    ]
    ]); ?>

    <?= $form->field($model, 'otra_ciudad')->textInput(['maxlength' => true]) ?>

   

</div>
