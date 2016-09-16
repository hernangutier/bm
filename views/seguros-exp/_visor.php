<?php

//use yii\imagine\Image;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;




/* @var $this yii\web\View */
/* @var $model app\models\SegurosExp */
/* @var $url yii\helpers\Url */


$this->title = 'Visor de Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visor-create">
 <?php $form = ActiveForm::begin(); ?>
 <?php $url='documents/' .$model->filename; ?>


 	<div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img src=<?= $url ?> alt="">
      <div class="caption">
        <h3>Expediente Digital Poliza: <?= $model->codseg0->npoliza  ?></h3>
        <p class="text-justify">
            Titulo: <?= $model->titulo ?>
        </p>
        <p>


				<?php if (Yii::$app->session->hasFlash('errordownload')): ?>
				<strong class="label label-danger">¡Ha ocurrido un error al descargar el archivo!</strong>

				<?php else: ?>








        </p>
      </div>
    </div>
  </div>

        <div class="form-group">
          <?= Html::a('Descargar', ['download','id'=>$model->cod], ['class' => 'btn btn-info']) ?>
          <a href="<?= $url ?>" class="btn btn-default">
												<i class="ace-icon fa fa-reply align-top bigger-125"></i>
												Volver
					</a>
        </div>

<?php endif; ?>

    <?php ActiveForm::end(); ?>
    </div>
