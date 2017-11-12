<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Speqmodelo;

/**
 * SpeqmodeloSearch represents the model behind the search form about `app\models\Speqmodelo`.
 */
class SpeqmodeloSearch extends Speqmodelo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkEqModelo'], 'integer'],
            [['codigo', 'descripcion', 'fkEqTipo'], 'safe'],
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
        $query = Speqmodelo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        # adicionamos un join para que hagan las busquedas
        $query->joinWith('fkEqTipo0');

        $query->andFilterWhere([
            'pkEqModelo' => $this->pkEqModelo,
            #'fkEqTipo' => $this->fkEqTipo, se bloqueo para hacer las busquedas
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'speqmodelo.descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'speqtipo.descripcion', $this->fkEqTipo]);

        return $dataProvider;
    }
}
