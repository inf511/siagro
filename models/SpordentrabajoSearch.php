<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Spordentrabajo;

/**
 * SpordentrabajoSearch represents the model behind the search form about `app\models\Spordentrabajo`.
 */
class SpordentrabajoSearch extends Spordentrabajo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkOrdenTrabajo', 'fkGestion'], 'integer'],
            [['codigo', 'nombre', 'supervisor', 'estado', 'data'], 'safe'],
            [['areaEstimada'], 'number'],
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
        $query = Spordentrabajo::find();

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
            'pkOrdenTrabajo' => $this->pkOrdenTrabajo,
            'fkGestion' => $this->fkGestion,
            'areaEstimada' => $this->areaEstimada,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'supervisor', $this->supervisor])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
