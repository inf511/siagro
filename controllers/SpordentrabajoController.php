<?php

namespace app\controllers;

use Yii;
use app\models\Spordentrabajo;
use app\models\Spgestion;
use app\models\SpordentrabajoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpordentrabajoController implements the CRUD actions for Spordentrabajo model.
 */
class SpordentrabajoController extends Controller
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
     * Lists all Spordentrabajo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpordentrabajoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Spordentrabajo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    
        return $this->render('view', [
                            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Creates a new Spordentrabajo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Spordentrabajo();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        
            # primero cargamos algunos datos al modelo
            $model->codigo = substr($model->data, 0, 3);
            $model->save();            
            return $this->redirect(['view', 'id' => $model->pkOrdenTrabajo]);
        } else {
            $gestion = Spgestion::find()
                    ->where(['estado' => 'T'])
                    ->one();
            # la primera vez cargo de id gestion al modelo
            $model->fkGestion = $gestion->pkGestion;
            return $this->render('create', [
                'model' => $model,
                'gestion' => $gestion,
            ]);
        }
    }

    /**
     * Updates an existing Spordentrabajo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) &&  $model->validate()) {
            $model->codigo = substr($model->data, 0, 3);
            $model->save();
            return $this->redirect(['view', 'id' => $model->pkOrdenTrabajo]);
        } else {
                    
            $gestion = Spgestion::find(['pkGestion' => $model->fkGestion])->one();
            
            return $this->render('update', [
                'model' => $model,
                'gestion' => $gestion,
            ]);
        }
    }

    /**
     * Deletes an existing Spordentrabajo model.
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
     * Finds the Spordentrabajo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Spordentrabajo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Spordentrabajo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
