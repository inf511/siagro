<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spitemobra".
 *
 * @property integer $pkItemObra
 * @property integer $fkOrdenTrabajo
 * @property integer $fkPoligono
 * @property integer $fkActividad
 * @property string $codigo
 * @property string $descripcion
 * @property string $areaTrab
 * @property string $rendimiento
 *
 * @property Spordentrabajo $fkOrdenTrabajo0
 * @property Sppoligono $fkPoligono0
 * @property Spactividad $fkActividad0
 */
class Spitemobra extends \yii\db\ActiveRecord
{

    public $codObra;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spitemobra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkOrdenTrabajo'], 'integer'],

            [['fkActividad'], 'integer'],
            [['fkActividad'], 'required'],

            [['fkPoligono'], 'integer'],
            [['fkPoligono'], 'required'],

            [['areaTrab'], 'number'],

            [['rendimiento'], 'number'],

            [['codigo'], 'string', 'max' => 6],
            [['codigo'], 'unique'],
            [['codigo'], 'required'],


            [['descripcion'], 'string', 'max' => 50],
            [['descripcion'], 'required',],

            [['codObra'], 'string', 'max' => 6],
            ['codObra', 'validarObra']

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkItemObra' => 'Identificador',
            'fkOrdenTrabajo' => 'Orden de Trabajo',
            'fkPoligono' => 'Poligono',
            'fkActividad' => 'Actividad',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'areaTrab' => 'Area Trabajo (HA)',
            'rendimiento' => 'Rendimiento[Hrs/HA]',
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
    public function getFkPoligono0()
    {
        return $this->hasOne(Sppoligono::className(), ['pkPoligono' => 'fkPoligono']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkActividad0()
    {
        return $this->hasOne(Spactividad::className(), ['pkActividad' => 'fkActividad']);
    }
}
