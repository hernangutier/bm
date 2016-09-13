<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clasificacion;

/**
 * ClasificacionSearch represents the model behind the search form about `app\models\Clasificacion`.
 */
class ClasificacionSearch extends Clasificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'grupo', 'subgrupo', 'seccion'], 'safe'],
            [['cod'], 'integer'],
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
        $query = Clasificacion::find();

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
            'cod' => $this->cod,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'grupo', $this->grupo])
            ->andFilterWhere(['like', 'subgrupo', $this->subgrupo])
            ->andFilterWhere(['like', 'seccion', $this->seccion]);

        return $dataProvider;
    }
}
