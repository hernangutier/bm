<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Movimientos;

/**
 * MovimientosSearch represents the model behind the search form about `app\models\Movimientos`.
 */
class MovimientosSearch extends Movimientos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codund_origen', 'codund_destino', 'coduser_origen', 'coduser_destino', 'coduser', 'tipo', 'status', 'periodo'], 'integer'],
            [['fecha', 'observaciones', 'ncontrol'], 'safe'],
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
        $query = Movimientos::find();

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
            'fecha' => $this->fecha,
            'codund_origen' => $this->codund_origen,
            'codund_destino' => $this->codund_destino,
            'coduser_origen' => $this->coduser_origen,
            'coduser_destino' => $this->coduser_destino,
            'coduser' => $this->coduser,
            'tipo' => $this->tipo,
            'status' => $this->status,
            'periodo' => $this->periodo,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'ncontrol', $this->ncontrol]);

        return $dataProvider;
    }
}
