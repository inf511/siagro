<?php

namespace app\controllers;

use Yii;
use app\models\Spordentrabajo;
use app\models\Spequipo;
use app\models\SpequipoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
/**
 * SpequipoController implements the CRUD actions for Spequipo model.
 */
class SpequipoController extends Controller
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
     * Lists all Spequipo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpequipoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Spequipo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $data  = '';

        if(!is_null($model)){
            $ot = Spordentrabajo::findOne(['pkOrdenTrabajo' => $model->fkOrdenTrabajo]);
            $data = '[' . $ot->data . '] ' . $ot->nombre;
        }

        return $this->render('view', [
            'model' => $model,
            'data'  => $data,
        ]);
    }

    /**
     * Creates a new Spequipo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Spequipo();

        // Esto es cuando estamos validando un codigo con la base de datos
        // estas 2 formas para el ajax funciona
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
        //if(Yii::$app->request->isAjax && $model->load($_POST)){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()){

            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data' => $model->codObra])->pkOrdenTrabajo;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkEquipo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Spequipo model.
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
        // Esto es cuando estamos validando un codigo con la base de datos
        // estas 2 formas para el ajax funciona
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
        //if(Yii::$app->request->isAjax && $model->load($_POST)){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }


        if ($model->load(Yii::$app->request->post()) && $model->validate()){

            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data' => $model->codObra])->pkOrdenTrabajo;
            $model->save();

            return $this->redirect(['view', 'id' => $model->pkEquipo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Spequipo model.
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
     * Finds the Spequipo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Spequipo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Spequipo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}



