<?php

namespace app\controllers;

use Yii;
use app\models\Spitemobra;
use app\models\SpitemobraSearch;
use app\models\Spordentrabajo;
use app\models\Sppoligono;
use app\models\Spactividad;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * SpitemobraController implements the CRUD actions for Spitemobra model.
 */
class SpitemobraController extends Controller
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
     * Lists all Spitemobra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpitemobraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Spitemobra model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model   = $this->findModel($id);
        $dataOt  = null;
        $dataPol = null;
        $dataAct = null;

        if(!empty($model)){
            $ot = Spordentrabajo::findOne($model->fkOrdenTrabajo);
            $dataOt = '[' . $ot->data . '] - ' . $ot->nombre;

            $pl = Sppoligono::findOne($model->fkPoligono);
            $dataPol = '[' . $pl->codigo . '] - ' . $pl->descripcion;

            $ac = Spactividad::findOne($model->fkActividad);
            $dataAct = '[' . $ac->codigo . '] - ' . $ac->descripcion;
        }

        return $this->render('view', [
            'model' => $model,
            'dataOt' => $dataOt,
            'dataPol' => $dataPol,
            'dataAct' => $dataAct,
        ]);
    }

    /**
     * Creates a new Spitemobra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Spitemobra();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data' => $model->codObra])->pkOrdenTrabajo;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkItemObra]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Spitemobra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!empty($model)){
            $ot = Spordentrabajo::findOne($model->fkOrdenTrabajo);
            $model->codObra = $ot->data;
        }

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data' => $model->codObra])->pkOrdenTrabajo;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkItemObra]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Spitemobra model.
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
     * Finds the Spitemobra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Spitemobra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Spitemobra::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
