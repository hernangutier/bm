<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seguros;

/**
 * SegurosSearch represents the model behind the search form about `app\models\Seguros`.
 */
class SegurosSearch extends Seguros
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codaseguradora','status', 'moneda', 'tipo_cobertura', 'codbien'], 'integer'],
            [['otra_aseguradora', 'npoliza', 'tipo', 'especifique_moneda', 'f_ini', 'f_fin', 'resp_civil', 'especifique_tipo_cobertura', 'descripcion_cobertura', 'observaciones'], 'safe'],
            [['monto'], 'number'],
            [['monto'], 'number'],
           [['active'], 'boolean'],


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
        $query = Seguros::find();

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
            'codaseguradora' => $this->codaseguradora,
            'monto' => $this->monto,
            'moneda' => $this->moneda,
            'f_ini' => $this->f_ini,
            'f_fin' => $this->f_fin,
            'tipo_cobertura' => $this->tipo_cobertura,
            'codbien' => $this->codbien,
            'status' => $this->status,
             'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'otra_aseguradora', $this->otra_aseguradora])
             ->andFilterWhere(['like', 'npoliza', $this->npoliza])
             ->andFilterWhere(['like', 'tipo', $this->tipo])
             ->andFilterWhere(['like', 'especifique_moneda', $this->especifique_moneda])
             ->andFilterWhere(['like', 'resp_civil', $this->resp_civil])
             ->andFilterWhere(['like', 'especifique_tipo_cobertura', $this->especifique_tipo_cobertura])
             ->andFilterWhere(['like', 'descripcion_cobertura', $this->descripcion_cobertura])
             ->andFilterWhere(['like', 'observaciones', $this->observaciones]);


        return $dataProvider;
    }
}
