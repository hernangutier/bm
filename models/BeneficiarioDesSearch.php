<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BeneficiarioDes;

/**
 * BeneficiarioDesSearch represents the model behind the search form about `app\models\BeneficiarioDes`.
 */
class BeneficiarioDesSearch extends BeneficiarioDes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod'], 'integer'],
            [['cedrif', 'razon', 'direccion', 'telefono'], 'safe'],
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
        $query = BeneficiarioDes::find();

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
            'cod' => $this->cod,
        ]);

        $query->andFilterWhere(['like', 'cedrif', $this->cedrif])
            ->andFilterWhere(['like', 'razon', $this->razon])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono]);

        return $dataProvider;
    }
}
