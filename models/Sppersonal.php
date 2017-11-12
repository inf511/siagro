<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sppersonal".
 *
 * @property integer $pkPersonal
 * @property string $fechaIngreso
 * @property string $nombreComp
 * @property string $apellidos
 * @property string $direccion
 * @property string $telefono
 * @property string $ci
 * @property string $fechaNac
 * @property integer $fkcargo
 * @property integer $fkOrdenTrabajo
 * @property string $email
 */
class Sppersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $codObra;

    public static function tableName()
    {
        return 'sppersonal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaIngreso', 'fechaNac'], 'safe'],
            [['fechaIngreso', 'fechaNac'], 'required'],

            [['fkcargo', 'fkOrdenTrabajo'], 'integer'],

            [['fkcargo'], 'required', 'message' => 'Cargo de personal no puede estar vacio'],

            [['nombreComp', 'apellidos', 'direccion', 'telefono'], 'string', 'max' => 50],

            [['ci', 'email'], 'string', 'max' => 25],

            [['nombreComp', 'apellidos', 'email'], 'required'],

            [['email'], 'email'],
            [['email'], 'required'],

            [['codObra'], 'validarObra'],
            [['codObra',], 'string', 'length' => 6],
            [['codObra',], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkPersonal' => 'Identificador',
            'fechaIngreso' => 'Fecha Ingreso',
            'nombreComp' => 'Nombre Completo',
            'apellidos' => 'Apellidos',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'ci' => 'Cedula de Identidad',
            'fechaNac' => 'Fecha Nacimiento',
            'fkcargo' => 'Cargo',
            'fkOrdenTrabajo' => 'Orden de Trabajo',
            'email' => 'Correo Electronico',
            'codObra' => 'Codigo de Orden de Trabajo',
        ];
    }

    public function validarObra($attribute, $params){

        $ot = Spordentrabajo::findOne(['data' => $this->codObra]);
        if(empty($ot)){
            $this->addError($attribute, 'Codigo de Obra [' . $this->codObra . '] No valido.');
            return true;
        }else{
            return false;
        }
    }

   /**
    * @return \yii\db\ActiveQuery
    */
   public function getFkcargo0()
   {
       return $this->hasOne(Spcargo::className(), ['pkCargo' => 'fkcargo']);
   }
        
   /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getFkOrdenTrabajo0() 
   { 
       return $this->hasOne(Spordentrabajo::className(), ['pkOrdenTrabajo' => 'fkOrdenTrabajo']); 
   } 


}
