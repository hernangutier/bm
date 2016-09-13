<?php
use yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use yii\grid\GridView;
use app\models\MovimientosDtSearch;
use kartik\select2\Select2;
use app\models\Bienes;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\MovimientoDts */
/* @var $form yii\widgets\ActiveForm */
/* @var $bien app\models\Bienes */
?>

<?php
//------------- Variables de PHP a JavaScript -----
    $_POST['url']=Url::toRoute('/bienes/add-detalle-movimientos','http');
    $_POST['urlfind']=Url::toRoute('/bienes/find','http');
    $_POST['idModel']=$model->cod;
    $_POST['count']=$model->getMovimientosDts()->count();

  echo "<script>\n";
  echo "urlJs='".$_POST['url']."'\n";
  echo "urlJsFind='".$_POST['urlfind']."'\n";
  echo "idJs='".$_POST['idModel']."'\n";
  echo "countJs='".$_POST['count']."'\n";
  echo "</script>\n";

 ?>


<?php
    //----------- Eventos --------------
    //------------- Carga del Formulario ------------


    //---------- Click Agregar ---------
    $this->registerJs("
          $('#add').on('click',function(){
                var idbien=$('#select-bienes').val();
                //-------------- id Desincorporacion -----

                var idmodel=idJs;
                //--------  Implemetar Funcionalidad Ajax ----
                $.ajax({
                    type     :'POST',
                    cache    : false,
                    url  : urlJs,
                    data: {id: idmodel, idbien: idbien},
                    dataType: 'text',
                    success  : function(data) {
                       if (data=1){
                         $.pjax.reload({container:'#w2'});

                       } else {
                         alert('Error');
                       }

                    }
                    });









          });

    ")



 ?>


<div class="proveedores-basicos">

<?php
  $bien= new Bienes();
  $searchModel = new MovimientosDtSearch();
  $searchModel->codmov=$model->cod;
  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

 ?>

 <div class="widget-box">
 												<div class="widget-header">
 													<h4 class="widget-title">Buscar Bienes</h4>

 													<div class="widget-toolbar">
 														<a href="#" data-action="collapse">
 															<i class="ace-icon fa fa-chevron-up"></i>
 														</a>


 													</div>
 												</div>

 												<div style="display: block;" class="widget-body">
 													<div class="widget-main">






                            <?php
                                        echo Select2::widget([
                                          'model' => $bien,

                                          'attribute' => 'codigo',
                                          'data' =>ArrayHelper::map($model->getListBienes(), 'cod', 'resultado'),
                                          'options' => ['placeholder' => 'Seleccione Bien ...',
                                                'id'=>'select-bienes'
                                            ],
                                          'pluginOptions' => [
                                            'allowClear' => true
                                          ],
                                          'pluginEvents' => [
                                              "change" => 'function(e) {
                                                e.preventDefault();
                                                var id=$(this).val();
                                                if ($(this).val()>0) {
                                                $("#bienes").show();
                                                $.ajax({
                                                    type     :"POST",
                                                    cache    : false,
                                                    url  : urlJsFind,
                                                    data: {id: id},
                                                    dataType: "json",
                                                    success  : function(data) {
                                                        $("#codigo").text(data.codigo);
                                                        $("#descripcion").text(data.descripcion);
                                                    }
                                                    });
                                                  } else {
                                                      $("#bienes").hide();

                                                  }





                                              }',

                                          ],
                                    ]);
                            ?>



                          <div id="bienes">

                             <a id="add" class="btn btn-white btn-info btn-bold">
                                    <i class="ace-icon fa fa-download  bigger-120 blue"></i>
                                    Agregar
                             </a>


                          <h4 class="blue">
                                   <span class="label label-primary arrowed-in-right">
                                      <i class="ace-icon fa fa-cog smaller-80 align-middle"></i>
                                            Datos del Bien
                                   </span>
                            </h4>

                          <div class="profile-user-info profile-user-info-striped">
                                              <div class="profile-info-row">
                                                <div class="profile-info-name">Código </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="codigo"><code>   <?= $model->cod ?></code></span>
                                                </div>
                                              </div>

                                              <div class="profile-info-row">
                                                <div class="profile-info-name"> Descripción </div>

                                                <div class="profile-info-value">
                                                  <span class="editable" id="descripcion"><?= $model->cod ?></span>
                                                </div>
                                              </div>




                            </div>
                        </div>





 													</div>
 												</div>
 											</div>

                    <?php
                          if ($model->getMovimientosDts()->count()>0){
                            echo '<a id="print" class="btn btn-white btn-info btn-bold">
                                   <i class="ace-icon fa fa-download  bigger-120 blue"></i>
                                   Imprimir Listado
                            </a>';
                          }

                     ?>


  <?php Pjax::begin(); ?>
  <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          [
            'attribute'=>'codbien',
            'label'=>'N° de Bien',
            'value'=>function ($model){
              return  $model->codbien0->codigo;
            },
          ],
          [
            'attribute'=>'descripcion',
            'label'=>'Descripción',
            'value'=>function ($model){
              return  $model->codbien0->descripcion;
            },
          ],

          [
            'attribute'=>'costo',
            'value'=>function ($model){
              return  number_format($model->codbien0->costo,2);
            },
          ],


          [  'class' => 'yii\grid\ActionColumn',
        'template' => '{delete}',
        // 'dropdown' => true,
        'buttons' => [

         'delete' => function ($url, $model) {
           return Html::a(Yii::t('app',''), ['movimientos-dt/delete', 'id' => $model->cod], [
               'class' => 'ace-icon fa fa-trash-o bigger-120 red',
               'data' => [
                   'confirm' => Yii::t('app', 'Estas Seguro de Eliminar el Items: ' . $model->codbien0->codigo),
                   'method' => 'post',
               ],
           ]);


           Html::a('<i class="ace-icon fa fa-trash-o bigger-120"></i>',
                      ['proveedores/delete','id'=>$model->cod],

                      ['title'=>'Actualizar',
                      'class'=>'red',
                     ]);
          },




      ],
    ],
      ],
  ]); ?>
  <?php Pjax::end(); ?>

  <h4 class="pull-right">
																Total Bsf:
															<span class="red"><?= number_format($model->getTotals(),2) ?></span>
															</h4>





</div>
