<?php

namespace app\controllers;

use Yii;
use app\models\SdbCategoriasEsp;
use app\models\SdbCategoriasEspSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SdbCategoriasEspController implements the CRUD actions for SdbCategoriasEsp model.
 */
class SdbCategoriasEspController extends Controller
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
     * Lists all SdbCategoriasEsp models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new SdbCategoriasEspSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdbCategoriasEsp model.
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
     * Creates a new SdbCategoriasEsp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $model = new SdbCategoriasEsp();
        $model->codsub=$id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/sdb-categorias-sub/view', 'id' => $model->codsub]);
        } else {
            return $this->render('_create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SdbCategoriasEsp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/sdb-categorias-sub/view', 'id' => $model->codsub]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SdbCategoriasEsp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $this->findModel($id)->delete();

        return $this->redirect(['/sdb-categorias-sub/view', 'id' => $model->codsub]);
    }

    /**
     * Finds the SdbCategoriasEsp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdbCategoriasEsp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdbCategoriasEsp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
