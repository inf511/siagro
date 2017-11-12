<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speqmodelo".
 *
 * @property integer $pkEqModelo
 * @property integer $fkEqTipo
 * @property string $codigo
 * @property string $descripcion
 * @property Speqtipo $fkEqTipo0
 * @property Spequipo[] $spequipos 
 */
class Speqmodelo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'speqmodelo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkEqTipo'], 'integer'],
            [['fkEqTipo'], 'required'],

            [['codigo'], 'string', 'max' => 2],
            [['codigo'], 'required'],

            [['descripcion'], 'string', 'max' => 25],
            [['descripcion'], 'required'],

            // necesidad codigo y fkEqTipo sea único juntos, y codigo recibirá un mensaje de error
            ['codigo', 'unique', 'targetAttribute' => ['fkEqTipo', 'codigo']]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkEqModelo' => 'Identificador',
            'fkEqTipo' => 'Tipo de Equipo',
            'codigo' => 'Codigo de Modelo',
            'descripcion' => 'Descripcion de Modelo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkEqTipo0()
    {
        return $this->hasOne(Speqtipo::className(), ['pkEqTipo' => 'fkEqTipo']);
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getSpequipos() 
    { 
        return $this->hasMany(Spequipo::className(), ['fkModelo' => 'pkEqModelo']); 
    }


}
