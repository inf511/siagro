<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spequipo".
 *
 * @property integer $pkEquipo
 * @property integer $fkTipoEquipo
 * @property integer $fkModelo
 * @property string $codigo
 * @property string $fkTipoContrato
 * @property string $fechaIngreso
 * @property integer $fkOrdenTrabajo
 * @property string $descripcion
 *
 * @property Speqtipo $fkTipoEquipo0
 * @property Speqmodelo $fkModelo0
 * @property Spordentrabajo $fkOrdenTrabajo0
 */
class Spequipo extends \yii\db\ActiveRecord
{

    public $codObra;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spequipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkTipoEquipo', 'fkModelo', 'fkOrdenTrabajo'], 'integer'],

            [['fkTipoEquipo'], 'required', 'message' => 'Tipo de Equipo no puede estar vacio.'],


            [['fkModelo'], 'required', 'message' => 'Modelo de Equipo no puede estar vacio.'],

            [['fkTipoContrato'], 'required', 'message' => "Tipo de Contrato no puede estar vacio."],
            [['fkTipoContrato'], 'string'],

            [['fechaIngreso'], 'safe'],
            [['fechaIngreso'], 'required', 'message' => 'Fecha no valida'],
            [['fechaIngreso'], 'date', 'format' => 'yyyy-mm-dd'],

            [['codigo'], 'string', 'max' => 9],
            [['codigo'], 'unique'],
            [['codigo'], 'string', 'length' => 9],

            [['descripcion'], 'string', 'max' => 50],
            [['descripcion'], 'required'],

            [['codObra',], 'string', 'length' => 6],
            [['codObra',], 'required'],
            ['codObra', 'validarObra']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkEquipo' => 'Identificador',
            'fkTipoEquipo' => 'Tipo de Equipo',
            'fkModelo' => 'Modelo de Equipo',
            'codigo' => 'Codigo de Equipo',
            'fkTipoContrato' => 'Tipo Contrato',
            'fechaIngreso' => 'Fecha Ingreso',
            'fkOrdenTrabajo' => 'Orden Trabajo',
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
    public function getFkTipoEquipo0()
    {
        return $this->hasOne(Speqtipo::className(), ['pkEqTipo' => 'fkTipoEquipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkModelo0()
    {
        return $this->hasOne(Speqmodelo::className(), ['pkEqModelo' => 'fkModelo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkOrdenTrabajo0()
    {
        return $this->hasOne(Spordentrabajo::className(), ['pkOrdenTrabajo' => 'fkOrdenTrabajo']);
    }
}
