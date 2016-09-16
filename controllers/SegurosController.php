<?php

namespace app\controllers;

use Yii;
use app\models\Seguros;
use app\models\SegurosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SegurosController implements the CRUD actions for Seguros model.
 */
class SegurosController extends Controller
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
     * Lists all Seguros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SegurosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seguros model.
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
     * Creates a new Seguros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$url)
    {
        $model = new Seguros();
        $model->codbien=$id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/bienes/view-resumen', 'id' => $model->codbien]);
        } else {
            return $this->render('create', [
                'model' => $model,'url'=>$url,
            ]);
        }
    }

    /**
     * Updates an existing Seguros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$url)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect($url);
        } else {
            return $this->render('update', [
                'model' => $model,'url'=>$url,
            ]);
        }
    }

    /**
     * Deletes an existing Seguros model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $modelTemp=$this->findModel($id);
        $this->findModel($id)->delete();
        unlink(Yii::app()->basePath.'/documents/'.$modelTemp->filename);
          return $this->redirect(['/seguros/view','id'=>$modelTemp->codseg0->cod]);



    }

    /**
     * Finds the Seguros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seguros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seguros::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
