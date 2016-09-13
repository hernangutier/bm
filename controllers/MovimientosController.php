<?php

namespace app\controllers;

use Yii;
use app\models\Movimientos;
use app\models\MovimientosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\Responsables;
use app\models\MovimientosDt;
/**
 * MovimientosController implements the CRUD actions for Movimientos model.
 */
class MovimientosController extends Controller
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
     * Lists all Movimientos models.
     * @return mixed
     */

    public  function actionAsignar1(){


      $model= new Movimientos(['scenario' => Movimientos::SCENARIO_ASIGNAR]);
      $model->tipo=0;


      $model->ncontrol=$model->getNum();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['paso2', 'id' => $model->cod]);
      } else {
      return $this->render('asignar1', [
          'model' => $model,
      ]);
    }
    }


    public  function actionPermutar(){


      $model= new Movimientos(['scenario' => Movimientos::SCENARIO_PERMUTAR]);
      $model->tipo=0;



      if ($model->load(Yii::$app->request->post())) {
          //--------- Obtenemos los Array de Objetos ----

              $bienes1=$model->coduserOrigen->getBienes();

            $bienes2=$model->coduserDestino->getBienes();




          //------- Actualizamos mediante Bucles ------
          //-------------- Creamos el primer movimiento ---
          $mov1= new Movimientos();
              $mov1->tipo=1;
              $mov1->coduser_origen=$model->coduser_destino;
              $mov1->coduser_destino=$model->coduser_origen;
              //-------------- Guardamos el primer movimiento ---
                $mov1->save();
              //-------------------------------------------------
              foreach($bienes2 as $cod=>$bienes2->cod){
                  $movDt= new MovimientosDt();
                    $movDt->codbien=$cod;
                    $movDt->codmov=$mov1->cod;
                    $movDt->save();
              }

              $mov1->status=1;
              $mov1->save();

              //-------------- Creamos el segundo movimiento ---
              $mov2= new Movimientos();
                  $mov2->tipo=1;
                  $mov2->coduser_origen=$model->coduser_origen;
                  $mov2->coduser_destino=$model->coduser_destino;
                  //-------------- Guardamos el primer movimiento ---
                    $mov1->save();
                  //-------------------------------------------------
                  foreach($bienes2 as $bien){
                      $movDt= new MovimientosDt();
                        $movdDt->codbien=$bien->cod;
                        $movDt->codmov=$mov2->cod;
                        $movDt->save();
                  }

                  $mov2->status=1;
                  $mov2->save();

                 //return $this->redirect(['paso2', 'id' => $model->cod]);
      } else {
      return $this->render('permutar', [
          'model' => $model,
      ]);
    }
    }


    public function actionConfirmar($id){
      $model=$this->findModel($id);

      $model->status=1;
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->render('/Autorizate/finish',['url'=>Url::toRoute('movimientos/index')]);
      } else {
      return $this->render('confirmar', [
          'model' => $model,
      ]);
    }
    }

    public  function actionPaso2($id){
      $model=$this->findModel($id);
      return $this->render('paso2', [
          'model' => $model,
      ]);


    }

    public  function actionTrasladar(){


      $model= new Movimientos(['scenario' => Movimientos::SCENARIO_TRASLADAR]);
      $model->tipo=1;
      $model->ncontrol=$model->getNum();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['paso2', 'id' => $model->cod]);
      } else {
      return $this->render('trasladar', [
          'model' => $model,
      ]);
    }
    }
    public  function actionDesvincular(){


      $model= new Movimientos(['scenario' => Movimientos::SCENARIO_DESVINCULAR]);
      $model->tipo=2;
      $model->ncontrol=$model->getNum();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['paso2', 'id' => $model->cod]);
      } else {
      return $this->render('desvincular', [
          'model' => $model,
      ]);
    }
    }

    public  function actionTrasladoUnd(){


      $model= new Movimientos(['scenario' => Movimientos::SCENARIO_TRASLADAR_UND]);
      $model->tipo=3;
      $model->ncontrol=$model->getNum();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['paso2', 'id' => $model->cod]);
      } else {
      return $this->render('traslado_und', [
          'model' => $model,
      ]);
    }
    }


    public function actionIndex()
    {
        $searchModel = new MovimientosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Movimientos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Movimientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movimientos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionAsignaciones()
    {
        $this->layout='layoutMovimientos';
        $model = new Movimientos();
        $model->tipo='A';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('asignaciones', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Movimientos model.
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

    /**
     * Deletes an existing Movimientos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Movimientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Movimientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movimientos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
