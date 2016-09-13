<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnidadesAdmin;

/**
 * UnidadesAdminSearch represents the model behind the search form about `app\models\UnidadesAdmin`.
 */
class UnidadesAdminSearch extends UnidadesAdmin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'ubicacion', 'telefono', 'codigo'], 'safe'],
            [['codresp', 'default_active', 'categoria', 'disponible_inc', 'cod', 'codsede'], 'integer'],
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
        $query = UnidadesAdmin::find()->orderBy('codigo');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'codresp' => $this->codresp,
            'default_active' => $this->default_active,
            'categoria' => $this->categoria,
            'disponible_inc' => $this->disponible_inc,
            'cod' => $this->cod,
            'codsede' => $this->codsede,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'codigo', $this->codigo]);

        return $dataProvider;
    }
}
