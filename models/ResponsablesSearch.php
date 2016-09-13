<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Responsables;

/**
 * ResponsablesSearch represents the model behind the search form about `app\models\Responsables`.
 */
class ResponsablesSearch extends Responsables
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedrif', 'nombres', 'direccion', 'telefono', 'fax', 'email', 'cargo', 'fregistro', 'alias', 'apellidos'], 'safe'],
            [['personal', 'codunidad', 'cod'], 'integer'],
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
        $query = Responsables::find();

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
            'fregistro' => $this->fregistro,
            'personal' => $this->personal,
            'codunidad' => $this->codunidad,
            'cod' => $this->cod,
        ]);

        $query->andFilterWhere(['like', 'cedrif', $this->cedrif])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos]);

        return $dataProvider;
    }
}
