<?php

namespace app\controllers;

use Yii;
use app\models\Sppersonal;
use app\models\SppersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\Response;
use app\models\Spordentrabajo;
use app\models\Spcargo;
/**
 * SppersonalController implements the CRUD actions for Sppersonal model.
 */
class SppersonalController extends Controller
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
     * Lists all Sppersonal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SppersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sppersonal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model  = $this->findModel($id);
        $ot     = Spordentrabajo::findOne(['pkOrdenTrabajo' => $model->fkOrdenTrabajo]);
        return $this->render('view', [
            'model'     => $model,
            'dataOt'    => '[' . $ot->data . '] ' . $ot->nombre,
            'dataCargo' => Spcargo::findOne(['pkCargo' => $model->fkcargo])->descripcion,
        ]);
    }

    /**
     * Creates a new Sppersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sppersonal();
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        } 


        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data' => $model->codObra])->pkOrdenTrabajo;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkPersonal]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sppersonal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!is_null($model))
        {
            $model->codObra = Spordentrabajo::findOne(['pkOrdenTrabajo' => $model->fkOrdenTrabajo])->data;
        }
        # el ajax
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->fkOrdenTrabajo = Spordentrabajo::findOne(['data' => $model->codObra])->pkOrdenTrabajo;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkPersonal]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sppersonal model.
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
     * Finds the Sppersonal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sppersonal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sppersonal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
