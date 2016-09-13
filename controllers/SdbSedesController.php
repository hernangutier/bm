<?php

namespace app\controllers;

use Yii;
use app\models\SdbSedes;
use app\models\SdbEstados;
use app\models\SdbMunicipios;
use app\models\SdbParroquias;
use app\models\SdbCiudades;
use app\models\SdbSedesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * SdbSedesController implements the CRUD actions for SdbSedes model.
 */
class SdbSedesController extends Controller
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

    
public  function ListaEstados($id){
     $items = SdbEstados::find()
        ->where(['codpais' => $id])
        ->asArray()
        ->all();
    foreach ($items as $i => $tournament) {
        $out[] = ['cod' => $tournament['cod'], 'descripcion' => $tournament['descripcion']];
    }
    return $out;
}

public function actionEstados() {
      $out = [];
    if (isset($_POST['depdrop_parents'])) {
         $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id = $parents[0];
        $list = SdbEstados::find()->Where(['codpais'=>$id])->asArray()->all();
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

public function actionMunicipios() {
      $out = [];
    if (isset($_POST['depdrop_parents'])) {
         $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id = $parents[0];
        $list = SdbMunicipios::find()->Where(['codest'=>$id])->asArray()->all();
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



public function actionParroquias() {
      $out = [];
    if (isset($_POST['depdrop_parents'])) {
         $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id = $parents[0];
        $list = SdbParroquias::find()->Where(['codmun'=>$id])->asArray()->all();
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

public function actionCiudades() {
      $out = [];
    if (isset($_POST['depdrop_parents'])) {
         $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id = $parents[0];
        $list = SdbCiudades::find()->Where(['codmun'=>$id])->asArray()->all();
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


    /**
     * Lists all SdbSedes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SdbSedesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdbSedes model.
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
     * Creates a new SdbSedes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SdbSedes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cod]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SdbSedes model.
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
     * Deletes an existing SdbSedes model.
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
     * Finds the SdbSedes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdbSedes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdbSedes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
