<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Spequipo;

/**
 * SpequipoSearch represents the model behind the search form about `app\models\Spequipo`.
 */
class SpequipoSearch extends Spequipo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkEquipo', 'fkTipoEquipo', 'fkModelo', 'fkOrdenTrabajo'], 'integer'],
            [['codigo', 'fkTipoContrato', 'fechaIngreso', 'descripcion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Spequipo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pkEquipo' => $this->pkEquipo,
            'fkTipoEquipo' => $this->fkTipoEquipo,
            'fkModelo' => $this->fkModelo,
            'fechaIngreso' => $this->fechaIngreso,
            'fkOrdenTrabajo' => $this->fkOrdenTrabajo,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'fkTipoContrato', $this->fkTipoContrato])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
