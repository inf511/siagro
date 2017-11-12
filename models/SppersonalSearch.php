<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sppersonal;

/**
 * SppersonalSearch represents the model behind the search form about `app\models\Sppersonal`.
 */
class SppersonalSearch extends Sppersonal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkPersonal', 'fkcargo', 'fkOrdenTrabajo'], 'integer'],
            [['fechaIngreso', 'nombreComp', 'apellidos', 'direccion', 'telefono', 'ci', 'fechaNac', 'email'], 'safe'],
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
        $query = Sppersonal::find();

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
            'pkPersonal' => $this->pkPersonal,
            'fechaIngreso' => $this->fechaIngreso,
            'fechaNac' => $this->fechaNac,
            'fkcargo' => $this->fkcargo,
            'fkOrdenTrabajo' => $this->fkOrdenTrabajo,
        ]);

        $query->andFilterWhere(['like', 'nombreComp', $this->nombreComp])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'ci', $this->ci])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
