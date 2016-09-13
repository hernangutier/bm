<?php

namespace app\controllers;

use Yii;
use app\models\DesincorporacionesBm;
use app\models\DesincorporacionesBmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
/**
 * DesincorporacionesBmController implements the CRUD actions for DesincorporacionesBm model.
 */
class DesincorporacionesBmController extends Controller
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
     * Lists all DesincorporacionesBm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DesincorporacionesBmSearch();
        $searchModel->periodo=\app\models\Periodos::getActive()->cod;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionAperturar(){
      $model= new DesincorporacionesBm();
      $model->periodo=\app\models\Periodos::getActive()->cod;
      $model->ncontrol=$model->getNum();
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //---------- Ir al Paso 2 -----------
        $this->redirect(['paso2','id'=>$model->cod]);
    } else {
      return $this->render('aperturar', [
          'model' => $model,
      ]);
    }

    }

    public function actionPaso3($id){
      $model=$this->findmodel($id);
      $model->status=1;

      if ($model->load(Yii::$app->request->post()) &&  $model->validate() && $model->save()) {
          return $this->render('/Autorizate/finish',['url'=>Url::toRoute('desincorporaciones-bm/index')]);

      } else {
      return $this->render('paso3', [
          'model' => $model,
      ]);
    }

    }

    public function actionPaso1($id){

     $model= $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //---------- Ir al Paso 2 -----------
        $this->redirect(['paso2','id'=>$model->cod]);
    } else {
      return $this->render('aperturar', [
          'model' => $model,
      ]);
    }

    }



    public function actionPaso2($id){
      $model= $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //---------- Ir al Paso 2
    } else {
      return $this->render('paso2', [
          'model' => $model,
      ]);
    }

    }


    /**
     * Displays a single DesincorporacionesBm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionAnularProceso($id){
      $model=$this->findmodel($id);
      $model->status=3;
      $model->scenario=DesincorporacionesBm::SCENARIO_NULLS;

      if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->render('/Autorizate/finish',['url'=>Url::toRoute('desincorporaciones-bm/index')]);
      } else {
        return $this->render('anular', [
                'model' => $model,



            ]);;
      }


    }

    public function actionAnular($id){
      $model=$this->findmodel($id);
      $model->status=2;
      $pass=new \app\models\Autorizate();
      $pass->password="";
      $operacion='Anular Desincorporacion N°: ' . $model->ncontrol;
      if ($pass->load(Yii::$app->request->post()) && $pass->validate()) {
        return $this->redirect(['anular-proceso', 'id' => $model->cod]);


      } else {
        return $this->render('autorizar', [
                'model' => $model,
                'pass'=>$pass,
                'operacion'=>$operacion,

            ]);;
      }

    }

    public function actionConfirmar($id){
      $model=$this->findmodel($id);
      $model->status=2;
      $pass=new \app\models\Autorizate();
      $pass->password="";
      $operacion='Confirmar Desincorporacion N°: ' . $model->ncontrol;
      if ($pass->load(Yii::$app->request->post()) && $pass->validate() && $model->save()) {

        return $this->render('/Autorizate/finish',['url'=>Url::toRoute('desincorporaciones-bm/index')]);

      } else {
        return $this->render('autorizar', [
                'model' => $model,
                'pass'=>$pass,
                'operacion'=>$operacion,

            ]);;
      }


    }

    public function actionViewAdmin($id)
    {
        return $this->render('view_admin', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Creates a new DesincorporacionesBm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DesincorporacionesBm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DesincorporacionesBm model.
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
     * Deletes an existing DesincorporacionesBm model.
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
     * Finds the DesincorporacionesBm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DesincorporacionesBm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DesincorporacionesBm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
