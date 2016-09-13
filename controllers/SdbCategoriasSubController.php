<?php

namespace app\controllers;

use Yii;
use app\models\SdbCategoriasSub;
use app\models\SdbCategoriasSubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\ErrorException;

/**
 * SdbCategoriasSubController implements the CRUD actions for SdbCategoriasSub model.
 */
class SdbCategoriasSubController extends Controller
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
     * Lists all SdbCategoriasSub models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new SdbCategoriasSubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdbCategoriasSub model.
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
     * Creates a new SdbCategoriasSub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new SdbCategoriasSub();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SdbCategoriasSub model.
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
     * Deletes an existing SdbCategoriasSub model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      try {
            $this->findModel($id)->delete();


          }catch (yii\db\IntegrityException $e)
        		{
        			return 'existe un error' ;
        		}


        return $this->redirect(['index']);
    }

    public function actionCreateAsociado($id){
      $model=new SdbCategoriasSub();
          $model->codgen=$id;
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
              return $this->redirect(['/sdb-categorias-general/view', 'id' => $id]);
          } else {
              return $this->render('_create', [
                  'model' => $model,
              ]);
          }

    }

    /**
     * Finds the SdbCategoriasSub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdbCategoriasSub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdbCategoriasSub::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
