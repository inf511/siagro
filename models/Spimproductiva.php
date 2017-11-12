<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spimproductiva".
 *
 * @property integer $pkImproductiva
 * @property string $codigo
 * @property string $descripcion
 */
class Spimproductiva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spimproductiva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo'], 'string', 'max' => 4],
            [['codigo'], 'required'],
            [['codigo'], 'unique'],

            [['descripcion'], 'string', 'max' => 50],
            [['descripcion'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkImproductiva' => 'Pk Improductiva',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
        ];
    }
}
