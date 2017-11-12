<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spordentrabajo".
 *
 * @property integer $pkOrdenTrabajo
 * @property string $codigo
 * @property integer $fkGestion
 * @property string $nombre
 * @property string $supervisor
 * @property string $areaEstimada
 * @property string $estado
 * @property string $data
 *
 * @property Spequipo[] $spequipos
 * @property Spitemobra[] $spitemobras
 * @property Spgestion $fkGestion0
 * @property Sppersonal[] $sppersonals
 * @property Sppoligono[] $sppoligonos
 * @property Sptransfequipo[] $sptransfequipos
 * @property Sptransfequipo[] $sptransfequipos0
 * @property Sptransfpersonal[] $sptransfpersonals
 * @property Sptransfpersonal[] $sptransfpersonals0
 */
class Spordentrabajo extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spordentrabajo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkGestion', 'areaEstimada', 'estado', 'data', 'nombre', 'supervisor' ], 'required'],
            
            [['fkGestion'], 'integer'],

            [['areaEstimada'], 'number'],

            [['estado'], 'string'],

            [['codigo'], 'string', 'max' => 3],

            [['nombre', 'supervisor'], 'string', 'max' => 50],

            [['data'], 'string', 'max' => 6],
            [['data'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkOrdenTrabajo' => 'Identificador',
            'codigo' => 'Codigo',
            'fkGestion' => 'Identificador de Gestion',
            'nombre' => 'Nombre',
            'supervisor' => 'Supervisor de Obra',
            'areaEstimada' => 'Area Estimada (HA)',
            'estado' => 'Estado de Obra',
            'data' => 'Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpequipos()
    {
        return $this->hasMany(Spequipo::className(), ['fkOrdenTrabajo' => 'pkOrdenTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpitemobras()
    {
        return $this->hasMany(Spitemobra::className(), ['fkOrdenTrabajo' => 'pkOrdenTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkGestion0()
    {
        return $this->hasOne(Spgestion::className(), ['pkGestion' => 'fkGestion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSppersonals()
    {
        return $this->hasMany(Sppersonal::className(), ['fkOrdenTrabajo' => 'pkOrdenTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSppoligonos()
    {
        return $this->hasMany(Sppoligono::className(), ['fkOrdenTrabajo' => 'pkOrdenTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSptransfequipos()
    {
        return $this->hasMany(Sptransfequipo::className(), ['fkOrdenDestino' => 'pkOrdenTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSptransfequipos0()
    {
        return $this->hasMany(Sptransfequipo::className(), ['fkOrdenOrigen' => 'pkOrdenTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSptransfpersonals()
    {
        return $this->hasMany(Sptransfpersonal::className(), ['fkOrdenOrigen' => 'pkOrdenTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSptransfpersonals0()
    {
        return $this->hasMany(Sptransfpersonal::className(), ['fkOrdenDestino' => 'pkOrdenTrabajo']);
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getSpactividads() 
    { 
        return $this->hasMany(Spactividad::className(), ['fkOrdenTrabajo' => 'pkOrdenTrabajo']); 
    }
}
