<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Spcargo;


class SpvisorController extends Controller
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
     * Muestra el mapa de google 
     * @param integer $id
     * @return mixed
     */
    public function actionIndex()
    {
        $alto = Yii::$app->session['alto'];
        $ancho = Yii::$app->session['ancho'];

        return $this->render('view', ['alto' => $alto, 'ancho' => $ancho]);
    }
    /**
     * Funcion que guarda el tamaño de la ventana dentro de la variable session
     * @param  [entero] $alto  Altura de la ventana
     * @param  [entero] $ancho Anchura de la ventana
     * @return
     */
    public function actionWindowsize($alto, $ancho){

        if($alto > 0 and $ancho > 0){
            
            $alto = $alto - ($alto * 0.2);
            Yii::$app->session['alto'] = $alto;

            $ancho = $ancho - ($ancho * 0.1);
            Yii::$app->session['ancho'] = $ancho;
        }
    }
}
