<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdbEstados;

/**
 * SdbEstadosSearch represents the model behind the search form about `\app\models\SdbEstados`.
 */
class SdbEstadosSearch extends SdbEstados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codigo', 'descripcion', 'codpais'], 'integer'],
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
        $query = SdbEstados::find();

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
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
            'codpais' => $this->codpais,
        ]);

        return $dataProvider;
    }
}
