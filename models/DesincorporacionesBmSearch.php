<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DesincorporacionesBm;

/**
 * DesincorporacionesBmSearch represents the model behind the search form about `app\models\DesincorporacionesBm`.
 */
class DesincorporacionesBmSearch extends DesincorporacionesBm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'concepto', 'periodo', 'paso', 'status', 'codben'], 'integer'],
            [['ncontrol', 'fecha_trans', 'fecha', 'observaciones', 'nacta', 'fecha_acta'], 'safe'],
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
        $query = DesincorporacionesBm::find();

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
            'concepto' => $this->concepto,
            'fecha_trans' => $this->fecha_trans,
            'fecha' => $this->fecha,
            'periodo' => $this->periodo,
            'paso' => $this->paso,
            'status' => $this->status,
            'fecha_acta' => $this->fecha_acta,
            'codben' => $this->codben,
        ]);

        $query->andFilterWhere(['like', 'ncontrol', $this->ncontrol])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'nacta', $this->nacta]);

        return $dataProvider;
    }
}
