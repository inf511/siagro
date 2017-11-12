<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spactividad".
 *
 * @property integer $pkActividad
 * @property integer $fkOrdenTrabajo
 * @property string $codigo
 * @property string $descripcion
 * 
 * @property Spordentrabajo $fkOrdenTrabajo0 
 * @property Spitemobra[] $spitemobras 
 */
class Spactividad extends \yii\db\ActiveRecord
{

    public $codObra;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spactividad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkOrdenTrabajo'], 'integer'],

            [['codigo'], 'string', 'max' => 2],
            [['codigo'], 'required'],
            // necesidad codigo y fkEqTipo sea único juntos, y codigo recibirá un mensaje de error
            ['codigo', 'unique', 'targetAttribute' => ['fkOrdenTrabajo', 'codigo']],

            [['descripcion'], 'string', 'max' => 50],
            [['descripcion'], 'required'],

            [['codObra',], 'string', 'length' => 6],
            [['codObra'], 'required'],
            [ 'codObra' , 'validarObra'],



        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkActividad' => 'Identificador',
            'fkOrdenTrabajo' => 'Orden de Trabajo',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'codObra' => 'Orden de Trabajo',
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
    public function getFkOrdenTrabajo0() 
    { 
       return $this->hasOne(Spordentrabajo::className(), ['pkOrdenTrabajo' => 'fkOrdenTrabajo']); 
    } 

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getSpitemobras() 
    { 
       return $this->hasMany(Spitemobra::className(), ['fkActividad' => 'pkActividad']); 
    } 

}
