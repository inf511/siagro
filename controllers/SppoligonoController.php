<?php

namespace app\controllers;

use Yii;
use app\models\Sppoligono;
use app\models\SppoligonoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Spordentrabajo;
use yii\widgets\ActiveForm;
use yii\helpers\Json;

/**
 * SppoligonoController implements the CRUD actions for Sppoligono model.
 */
class SppoligonoController extends Controller
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
     * Lists all Sppoligono models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SppoligonoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sppoligono model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $model = $this->findModel($id);

        $obra = Spordentrabajo::findOne($model->fkOrdenTrabajo);
        $codigo = '[' . $obra->data . '] - ' . $obra->nombre;

        return $this->render('view', [
            'model'     => $model,
            'codigo'    => $codigo,
        ]);
    }

    /**
     * Creates a new Sppoligono model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sppoligono();

        // pregunto si es un entrada ajax
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data' => $model->codObra])->pkOrdenTrabajo;
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkPoligono]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sppoligono model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!is_null($model)){
            $ot = $model->getFkOrdenTrabajo0()->one();
            $model->codObra = $ot->data;
        }

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data'=> $model->codObra])->pkOrdenTrabajo;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkPoligono]);
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sppoligono model.
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
     * Finds the Sppoligono model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sppoligono the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sppoligono::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetcodigo($id)
    {
        $model = Sppoligono::findOne($id);
        echo Json::encode($model);
        
    }

}
