<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Spitemobra;

/**
 * SpitemobraSearch represents the model behind the search form about `app\models\Spitemobra`.
 */
class SpitemobraSearch extends Spitemobra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkItemObra', 'fkOrdenTrabajo', 'fkPoligono', 'fkActividad'], 'integer'],
            [['codigo', 'descripcion'], 'safe'],
            [['areaTrab', 'rendimiento'], 'number'],
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
        $query = Spitemobra::find();

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
            'pkItemObra' => $this->pkItemObra,
            'fkOrdenTrabajo' => $this->fkOrdenTrabajo,
            'fkPoligono' => $this->fkPoligono,
            'fkActividad' => $this->fkActividad,
            'areaTrab' => $this->areaTrab,
            'rendimiento' => $this->rendimiento,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
