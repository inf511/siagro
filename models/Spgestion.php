<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spgestion".
 *
 * @property integer $pkGestion
 * @property string $codigo
 * @property string $fechaIni
 * @property string $fechaFin
 * @property string $estado
 */
class Spgestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spgestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaIni', 'fechaFin'], 'safe'],
            [['fechaIni', 'fechaFin'], 'required', 'message' => 'Fecha no valida'],
            [['fechaIni', 'fechaFin'], 'date', 'format' => 'yyyy-mm-dd'],
            
            [['estado'], 'string'],
            [['estado'], 'required', 'message' => 'Seleccione estado de gestion'],

            [['codigo'], 'string', 'max' => 2],
            [['codigo'], 'unique', 'message'  => 'Codigo de gestion duplicado'],
            [['codigo'], 'required', 'message'=> 'Codigo de gestion no valido'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkGestion' => 'Identificador',
            'codigo' => 'Codigo de Gestion',
            'fechaIni' => 'Fecha de Inicio',
            'fechaFin' => 'Fecha de Finalizacion',
            'estado' => 'Estado',
        ];
    }


    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getSpordentrabajos() 
    { 
       return $this->hasMany(Spordentrabajo::className(), ['fkGestion' => 'pkGestion']); 
    } 

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getSptransfequipos() 
    { 
       return $this->hasMany(Sptransfequipo::className(), ['fkGestion' => 'pkGestion']); 
    } 

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getSptransfpersonals() 
    { 
       return $this->hasMany(Sptransfpersonal::className(), ['fkGestion' => 'pkGestion']); 
    } 
    
}
