<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Spdatos;
use app\models\Spcargo;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Expression;

class SpdatosController extends Controller{

	// se esta cambiando el modelo de datos 
	// por el modelo mas sencillo
	// sera el modelo spcargo

	public function behaviors(){
	    return 	[
		    'verbs' => [
		        'class' => VerbFilter::className(),
		        'actions' =>[
					        'index'		=>['get'],
					        'view'		=>['get'],
					        'create'	=>['post'],
					        'update'	=>['post'],
					        'delete' 	=>['delete'],
					        'deleteall'	=>['post'],
		        			],
	    			]
    			];
	}

  	/* Esto se ejecuta antes de cualquier accion */
	public function beforeAction($event)
	{
	    $action = $event->id;
	    if (isset($this->actions[$action])){
	    	$verbs = $this->actions[$action];
	    } elseif (isset($this->actions['*'])) {
	    	$verbs = $this->actions['*'];
	    } else {
	    	return $event->isValid;
	    }

	    $verb = Yii::$app->getRequest()->getMethod();
	 
	  	$allowed = array_map('strtoupper', $verbs);
	 
		if(!in_array($verb, $allowed)) {
			$this->setHeader(400);
			echo json_encode(array('status'=>0,'error_code'=>400,'message'=>'Method not allowed'),JSON_PRETTY_PRINT);
			exit;
		}	 
	  return true;  
	}
    private function setHeader($status)
	{

		$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
		$content_type="application/json; charset=utf-8";

		header($status_header);
		header('Content-type: ' . $content_type);
		header('X-Powered-By: ' . "Siagro <siagro.com.bo>");
	}

	// con el modelo spcargo
	public function actionCreate(){

		$params=$_REQUEST;

		$model = new Spcargo();
		$model->attributes=$params;

		// primero modifico los valores que estan llegando para
		// Llave 
		//$model->pkCargo = -1;
		// fkAyudante
		//$model->codigo = "003";
		// fkEquipo
		//$model->descripcion = "INGENIERO AGRONOMO";
		
		if ($model->save()){
			$this->setHeader(200);
			echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);

		} 
		else
		{
			$this->setHeader(400);
			echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
		}
	}

	// sera un post que guardara el punto de del gps	
	/*
	public function actionCreate(){

		$params=$_REQUEST;

		$model = new Spdatos();
		$model->attributes=$params;

		// primero modifico los valores que estan llegando para
		// fkOperador
		$model->fkOperador = -1;
		// fkAyudante
		$model->fkAyudante = -1;
		// fkEquipo
		$model->fkEquipo = -1;
		// fkObra
		$model->fkObra = -1;
		// fkActividad
		$model->fkActividad  = -1;
		// hmto
		$model->hmto = 100;
		// punto al llegar llegara una cadena de tipo string separado por coma

		//$model->punto = "POINT(25.774252 -80.190262)";
		$model->punto = new Expression("GeomFromText(:point)", array(':point' => 'POINT(25.774252 -80.190262)'));
		// nroTel sera el mismo que llegue
		
		// fechaArduino Sera la fecha de arduino que llega
		$model->fechaArduino = date('Y-m-d');
		// fechaServer
		$model->fechaServer = date('Y-m-d');

		
		if ($model->save()){
			$this->setHeader(200);
			echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);

		} 
		else
		{
			$this->setHeader(400);
			echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
		}
	}
	*/
	private function _getStatusCodeMessage($status)
	{
		// these could be stored in a .ini file and loaded
		// via parse_ini_file()... however, this will suffice
		// for an example
		$codes = Array(
					200 => 'OK',
					400 => 'Bad Request',
					401 => 'Unauthorized',
					402 => 'Payment Required',
					403 => 'Forbidden',
					404 => 'Not Found',
					500 => 'Internal Server Error',
					501 => 'Not Implemented',
		);
		return (isset($codes[$status])) ? $codes[$status] : '';
	}

}

?>