<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spplano".
 *
 * @property integer $pkPlano
 * @property integer $fkOrdenTrabajo
 * @property string $descripcion
 * @property string $codigo
 * @property string $poligono
 *
 * @property Spordentrabajo $fkOrdenTrabajo0
 */
class Spplano extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spplano';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkOrdenTrabajo', 'descripcion', 'codigo', 'poligono'], 'required'],
            [['fkOrdenTrabajo'], 'integer'],
            [['poligono'], 'string'],
            [['descripcion'], 'string', 'max' => 50],
            [['codigo'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkPlano' => 'Pk Plano',
            'fkOrdenTrabajo' => 'Fk Orden Trabajo',
            'descripcion' => 'Descripcion',
            'codigo' => 'Codigo',
            'poligono' => 'Poligono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkOrdenTrabajo0()
    {
        return $this->hasOne(Spordentrabajo::className(), ['pkOrdenTrabajo' => 'fkOrdenTrabajo']);
    }
}
