<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdbSedes;

/**
 * SdbSedesSearch represents the model behind the search form about `\app\models\SdbSedes`.
 */
class SdbSedesSearch extends SdbSedes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codpais', 'codparro', 'codciudad', 'tipo', 'codest', 'codmun'], 'integer'],
            [['codigo', 'descripcion', 'localizacion', 'otro_pais', 'otra_ciudad', 'urbanizacion', 'calle_av', 'casa_edif', 'piso'], 'safe'],
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
        $query = SdbSedes::find();

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
            'codpais' => $this->codpais,
            'codparro' => $this->codparro,
            'codciudad' => $this->codciudad,
            'tipo' => $this->tipo,
            'codest' => $this->codest,
            'codmun' => $this->codmun,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'localizacion', $this->localizacion])
            ->andFilterWhere(['like', 'otro_pais', $this->otro_pais])
            ->andFilterWhere(['like', 'otra_ciudad', $this->otra_ciudad])
            ->andFilterWhere(['like', 'urbanizacion', $this->urbanizacion])
            ->andFilterWhere(['like', 'calle_av', $this->calle_av])
            ->andFilterWhere(['like', 'casa_edif', $this->casa_edif])
            ->andFilterWhere(['like', 'piso', $this->piso]);

        return $dataProvider;
    }
}
