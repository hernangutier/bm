<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DesincorporacionesConceptos;

/**
 * DesincorporacionesConceptosSearch represents the model behind the search form about `app\models\DesincorporacionesConceptos`.
 */
class DesincorporacionesConceptosSearch extends DesincorporacionesConceptos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codigo', 'tipo'], 'integer'],
            [['descripcion'], 'safe'],
            [['aplica_acta', 'aplica_terceros'], 'boolean'],
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
        $query = DesincorporacionesConceptos::find();

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
            'aplica_acta' => $this->aplica_acta,
            'aplica_terceros' => $this->aplica_terceros,
            'tipo' => $this->tipo,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
