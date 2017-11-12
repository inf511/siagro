<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spcargo".
 *
 * @property integer $pkCargo
 * @property string $codigo
 * @property string $descripcion
 * @property Sppersonal[] $sppersonals 
 */
class Spcargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spcargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo'], 'string', 'max' => 3],
            [['descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkCargo' => 'Pk Cargo',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
        ];
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getSppersonals() 
    { 
       return $this->hasMany(Sppersonal::className(), ['fkcargo' => 'pkCargo']); 
    } 
}
