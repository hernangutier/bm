<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-basicos">

        

    


    

    

    <?= $form->field($model, 'direccion')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->widget(\yii\widgets\MaskedInput::className(), [
    	'mask' => '9999-999-9999',
	]) ?>

    <?= $form->field($model, 'telefono2')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999-999-9999',
    ]) ?>    
    
	<?= $form->field($model, 'fax')->widget(\yii\widgets\MaskedInput::className(), [
    	'mask' => '9999-999-9999',
	]) ?>
    
	<?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
    		'name' => 'input-36',
    			'clientOptions' => [
        		'alias' =>  'email'
    			],
	]) ?>
    
    

    

   


   

    

</div>
