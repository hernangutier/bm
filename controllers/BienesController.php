<?php

namespace app\controllers;

use Yii;
use app\models\Bienes;
use app\models\BienesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DesincorporacionesDt;
use app\models\MovimientosDt;
use app\models\Seguros;
use app\models\SdbModelos;
use yii\helpers\Json;
use yii\helpers\Html;
/**
 * BienesController implements the CRUD actions for Bienes model.
 */
class BienesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bienes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BienesSearch();
        $searchModel->tipobien=0;
        $searchModel->activo=1;
        $searchModel->is_in=true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexUso()
    {
        $searchModel = new BienesSearch();
        $searchModel->tipobien=1;
        $searchModel->activo=1;
        $searchModel->is_in=true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexuso', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bienes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionViewResumen($id)
    {
        return $this->render('view_resumen', [
            'model' => $this->findModel($id),
        ]);
    }


    public function getModelosMarca($id){
      //----------- Consultamos en Sql a los MOdelos Marca ------

    }

    public function actionModelos() {
      $out = [];
                   if (isset($_POST['depdrop_parents'])) {
                        $parents = $_POST['depdrop_parents'];
                       if ($parents != null) {
                           $id = $parents[0];


                       $list = Bienes::getListSqlModelosMarcas($id);
                       $selected  = null;
                       if ($id != null && count($list) > 0) {
                           $selected = '';
                           foreach ($list as $i => $account) {
                               $out[] = ['id' => $account['cod'], 'name' => $account['descripcion']];
                               if ($i == 0) {
                                   $selected = $account['cod'];
                               }
                           }

                           // Shows how you can preselect a value
                           echo Json::encode(['output' => $out, 'selected'=>$selected]);
                           return;
                       }
                   }
               }
                   echo Json::encode(['output' => '', 'selected'=>'']);
   }












    public function actionFind()
        {
            $data = Yii::$app->request->post('id');
            if (isset($data)) {
                $model=$this->findmodel($data);



            } else {
                $model = "Ajax failed";
            }
            return \yii\helpers\Json::encode($model);
        }

        public function actionAddDetalle(){
                $iddes = Yii::$app->request->post('id');
                $idbien = Yii::$app->request->post('idbien');
                $detalle= new DesincorporacionesDt();
                        $detalle->codbien=$idbien;
                        $detalle->coddes=$iddes;
                  if ($detalle->save()) {
                    return '1';
                  }  else {
                    return '0';
                  }
        }

        public function actionAddDetalleMovimientos(){
                $idmov = Yii::$app->request->post('id');
                $idbien = Yii::$app->request->post('idbien');
                $detalle= new MovimientosDt();
                        $detalle->codbien=$idbien;
                        $detalle->codmov=$idmov;
                  if ($detalle->save()) {
                    return '1';
                  }  else {
                    return '0';
                  }
        }

        public function actionSetSeguro($id,$url){
          $count=Seguros::findOne(['codbien'=> $id,'status'=>0]);
          if (!(is_null($count))){
              $this->redirect(['/seguros/update','id'=>$count->cod,'url'=>$url,]);
          } else {
             $this->redirect(['/seguros/create','id'=>$id,'url'=>$url,]);
          }

        }

        public function actionReport(){
          return $this->render('report');
        }

    /**
     * Creates a new Bienes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bienes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bienes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionEdith($id,$url)
    {
        $model = $this->findModel($id);
        $model->scenario=Bienes::SCENARIO_MIGRACION;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect($url);
        } else {
            return $this->render('edith_migracion', [
                'model' => $model,
                'url'=>$url,
            ]);
        }
    }

    /**
     * Deletes an existing Bienes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function geenerateTXT(){
      $archivo = fopen('documents/archivo.txt','a');
      $rows = Bienes::find()->all();
      fputs($archivo,"N° de Bien");
      fputs($archivo," | ");
      fputs($archivo,"Descripcion");
      fputs($archivo,"\n");
      foreach($rows as $row)
          {
                fputs($archivo,$row->codigo);
                fputs($archivo," | ");
                fputs($archivo,$row->descripcion);
                fputs($archivo,"\n");

          }


        fclose($archivo);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bienes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bienes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bienes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
