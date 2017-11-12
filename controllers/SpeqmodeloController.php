<?php

namespace app\controllers;

use Yii;
use app\models\Speqmodelo;
use app\models\SpeqmodeloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Speqtipo;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
/**
 * SpeqmodeloController implements the CRUD actions for Speqmodelo model.
 */
class SpeqmodeloController extends Controller
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
     * Lists all Speqmodelo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpeqmodeloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Speqmodelo model.
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
     * Creates a new Speqmodelo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Speqmodelo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pkEqModelo]);
        } else {
            # obtenemos los tipos de equipos 
            $tipo = new Speqtipo();
            $tipos = ArrayHelper::map($tipo->find()->all(), 'pkEqTipo', 'descripcion');
            return $this->render('create', [
                'model' => $model,
                'tipos' => $tipos,
            ]);
        }
    }

    /**
     * Updates an existing Speqmodelo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pkEqModelo]);
        } else {
            $tipo = new Speqtipo();
            $tipos = ArrayHelper::map($tipo->find()->all(), 'pkEqTipo', 'descripcion');
            return $this->render('update', [
                'model' => $model,
                'tipos' => $tipos,
            ]);
        }
    }

    /**
     * Deletes an existing Speqmodelo model.
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
     * Finds the Speqmodelo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Speqmodelo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Speqmodelo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLists($id)
    {
        $modelos      = Speqmodelo::find()
                        ->where(['fkEqTipo' => $id])
                        ->all();

        if(isset($modelos) && (count($modelos) > 0 ))
        {
            echo "<option value='' >Seleccione Modelo de Equipo</option>";
            foreach ($modelos as $modelo) {
                echo "<option value = '" . $modelo->pkEqModelo . "'>" . $modelo->descripcion . "</option>";
            }
        } else {
            echo "<option value='' >Seleccione Modelo de Equipo</option>";
        }
    }

    public function actionGetcodigo($id){
        $modelo = Speqmodelo::findOne($id);
        echo Json::encode($modelo);
    }
}
