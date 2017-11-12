<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speqtipo".
 *
 * @property integer $pkEqTipo
 * @property string $codigo
 * @property string $descripcion
 *
 * @property Speqmodelo[] $speqmodelos
 */
class Speqtipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'speqtipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo'], 'string', 'max' => 2],
            [['codigo'], 'required', 'message' => 'Codigo de tipo de equipo necesario'],
            [['codigo'], 'unique'],

            [['descripcion'], 'string', 'max' => 25],
            [['descripcion'], 'required', 'message' => 'Descripcion de tipo de equipo necesario'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkEqTipo' => 'Identificador',
            'codigo' => 'Codigo de Tipo',
            'descripcion' => 'Descripcion de Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeqmodelos()
    {
        return $this->hasMany(Speqmodelo::className(), ['fkEqTipo' => 'pkEqTipo']);
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getSpequipos() 
    { 
       return $this->hasMany(Spequipo::className(), ['fkTipoEquipo' => 'pkEqTipo']); 
    } 

}
