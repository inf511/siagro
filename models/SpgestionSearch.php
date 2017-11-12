<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Spgestion;

/**
 * SpgestionSearch represents the model behind the search form about `app\models\Spgestion`.
 */
class SpgestionSearch extends Spgestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkGestion'], 'integer'],
            [['codigo', 'fechaIni', 'fechaFin', 'estado'], 'safe'],
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
        $query = Spgestion::find();

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
            'pkGestion' => $this->pkGestion,
            'fechaIni' => $this->fechaIni,
            'fechaFin' => $this->fechaFin,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
