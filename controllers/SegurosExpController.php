<?php

namespace app\controllers;

use Yii;
use app\models\SegurosExp;
use app\models\SegurosExpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * SegurosExpController implements the CRUD actions for SegurosExp model.
 */
class SegurosExpController extends Controller
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
     * Lists all SegurosExp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SegurosExpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SegurosExp model.
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
     * Creates a new SegurosExp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

      $model = new SegurosExp();
      $model->codseg=$id;

    if ($model->load(Yii::$app->request->post()) ) {
        $model->file=UploadedFile::getInstance($model,'file');
        $namefile=uniqid('');
        $model->file->saveAs('documents/'. $namefile .'.' . $model->file->extension );
        $model->filename= $namefile .'.' . $model->file->extension;
        if ($model->save()) {
          return $this->redirect(['/seguros/view', 'id' => $model->codseg]);
        }
    } else {
      return $this->render('create', [
          'model' => $model,
      ]);
    }
  }


  public function actionDownload($id)

       {

            $model=$this->findModel($id);



             //Si el archivo no se ha podido descargar
             //downloadFile($dir, $file, $extensions=[])
             if (!$this->downloadFile("documents/", Html::encode($model->filename), ["pdf", "txt", "doc","jpg","jpeg"]))
             {
              //Mensaje flash para mostrar el error
              Yii::$app->session->setFlash("errordownload");
             }



  }

  private function downloadFile($dir, $file, $extensions=[])
      {
       //Si el directorio existe
       if (is_dir($dir))
       {
        //Ruta absoluta del archivo
        $path = $dir.$file;

        //Si el archivo existe
        if (is_file($path))
        {
         //Obtener información del archivo
         $file_info = pathinfo($path);
         //Obtener la extensión del archivo
         $extension = $file_info["extension"];

         if (is_array($extensions))
         {
          //Si el argumento $extensions es un array
          //Comprobar las extensiones permitidas
          foreach($extensions as $e)
          {
           //Si la extension es correcta
           if ($e === $extension)
           {
            //Procedemos a descargar el archivo
            // Definir headers
            $size = filesize($path);
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=$file");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $size);
            // Descargar archivo
            readfile($path);
            //Correcto
            return true;
           }
          }
         }

        }
       }
       //Ha ocurrido un error al descargar el archivo
       return false;
      }


      public function actionVisor($id,$url){
        $model=$this->findModel($id);

        if (Yii::$app->request->post()) {
            if (!$this->downloadFile("documents/", Html::encode($model->filename), ["pdf", "txt", "doc","jpg","jpeg"])) {
                //Mensaje flash para mostrar el error
               Yii::$app->session->setFlash("errordownload");
            }
        }
         else {
            return $this->render('_visor', [
            'model' => $this->findModel($id),
            'url'=>$url,
        ]);
        }
      }


    /**
     * Updates an existing SegurosExp model.
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
     * Deletes an existing SegurosExp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $modelTemp=$this->findModel($id);
        $this->findModel($id)->delete();
        unlink(Yii::$app->basePath.'/web/documents/'.$modelTemp->filename);
        return $this->redirect(['/seguros/view','id'=>$modelTemp->codseg0->cod]);


    }

    /**
     * Finds the SegurosExp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SegurosExp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SegurosExp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
