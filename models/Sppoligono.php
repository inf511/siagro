<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sppoligono".
 *
 * @property integer $pkPoligono
 * @property integer $fkOrdenTrabajo
 * @property string $codigo
 * @property string $descripcion
 *
 * @property Spitemobra[] $spitemobras 
 * @property Spordentrabajo $fkOrdenTrabajo0 
 */
class Sppoligono extends \yii\db\ActiveRecord
{

    public $codObra;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sppoligono';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkOrdenTrabajo'], 'integer'],

            [['codigo'], 'string', 'max' => 3],
            [['codigo'], 'required'],
            ['codigo', 'unique', 'targetAttribute' => ['fkOrdenTrabajo', 'codigo']],

            [['descripcion'], 'string', 'max' => 50],
            [['descripcion'], 'required'],

            [['codObra',], 'string', 'length' => 6],
            [['codObra'], 'validarObra'],
            [['codObra'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkPoligono' => 'Identificador',
            'fkOrdenTrabajo' => 'Orden de Trabajo',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'codObra'   => 'Orden de Trabajo',
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
    public function getSpitemobras() 
    { 
       return $this->hasMany(Spitemobra::className(), ['fkPoligono' => 'pkPoligono']); 
    } 
         
    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getFkOrdenTrabajo0() 
    { 
       return $this->hasOne(Spordentrabajo::className(), ['pkOrdenTrabajo' => 'fkOrdenTrabajo']); 
    } 

}
