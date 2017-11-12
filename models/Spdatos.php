<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spdatos".
 *
 * @property integer $pkDatos
 * @property integer $fkOperador
 * @property integer $fkAyudante
 * @property integer $fkEquipo
 * @property integer $fkObra
 * @property string  $fechaArduino
 * @property integer $fkActividad
 * @property double  $hmto
 * @property string  $punto
 * @property string  $fechaServer
 * @property string  $nroTel
 */
class Spdatos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spdatos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkOperador', 'fkAyudante', 'fkEquipo', 'fkObra', 'fechaArduino', 'fkActividad', 'hmto', 'punto', 'fechaServer', 'nroTel'], 'required'],
            [['fkOperador', 'fkAyudante', 'fkEquipo', 'fkObra', 'fkActividad'], 'integer'],
            [['fechaArduino', 'fechaServer'], 'safe'],
            [['hmto'], 'number'],
            //[['punto'], 'string'],
            [['nroTel'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkDatos' => 'Pk Datos',
            'fkOperador' => 'Fk Operador',
            'fkAyudante' => 'Fk Ayudante',
            'fkEquipo' => 'Fk Equipo',
            'fkObra' => 'Fk Obra',
            'fechaArduino' => 'Fecha Arduino',
            'fkActividad' => 'Fk Actividad',
            'hmto' => 'Hmto',
            'punto' => 'Punto',
            'fechaServer' => 'Fecha Server',
            'nroTel' => 'Nro Tel',
        ];
    }
}
