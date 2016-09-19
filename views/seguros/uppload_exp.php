<?php
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
//use dosamigos\datepicker\DatePicker;
use kartik\widgets\TouchSpin;
use kartik\money\MaskMoney;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\SegurosExp */
/* @var $form yii\widgets\ActiveForm */
$this->title ='Adjuntar archivo al Expediente Digital de Poliza N°: ' . $model->npoliza;
$this->params['breadcrumbs'][] = ['label' => 'Datos del Bovinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
