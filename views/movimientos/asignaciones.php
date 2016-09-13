<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */

$this->title = Yii::t('app', 'Nueva Asignación');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Historico Movimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-create">

    <div class="panel panel-primary">
      			<div class="panel-heading">Nueva Asignación</div>
      				<div class="panel-body">
    	<?php $form = ActiveForm::begin(); ?>
    		<!--  Campos segun el Caso Asignaciones de Bienes a Usuarios  -->
    		<?php //-------------- Origen -------------
       
				    echo $form->field($model, 'codund_origen')->widget(Select2::classname(), [
				            
				            'data' => ArrayHelper::map(app\models\UnidadesAdmin::find()->all(),'cod',
				                 function($model, $defaultValue) {
				                    return $model->descripcion;
				            }
				    ),
				            'language' => 'es',

				            'options' => ['placeholder' => 'Origen del Inventario ...'],
				            'pluginOptions' => [
				            'allowClear' => true
				            ],

				            ]);
				        
				    ?>	


			<?php //-------------- Usuarios -------------
       
				    echo $form->field($model, 'coduser_origen')->widget(Select2::classname(), [
				            
				            'data' => ArrayHelper::map(app\models\Responsables::find()->all(),'cod',
				                 function($model, $defaultValue) {
				                    return $model->getNombreCompleto();
				            }
				    ),
				            'language' => 'es',

				            'options' => ['placeholder' => 'Usuario a Asignar los Bienes'],
				            'pluginOptions' => [
				            'allowClear' => true
				            ],

				            ]);
				        
				    ?>
			<?= $form->field($model, 'observaciones')->textarea(['maxlength' => true]) ?>	    		    

    	<div class="form-group">
   			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Siguiente') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         	
         </div>			 

    	</div>
	
    </div>  					
</div>
