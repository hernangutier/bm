<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnidadesAdminOrg;

/**
 * UnidadesAdminOrgSearch represents the model behind the search form about `app\models\UnidadesAdminOrg`.
 */
class UnidadesAdminOrgSearch extends UnidadesAdminOrg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codhijo', 'codpadre'], 'integer'],
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
        $query = UnidadesAdminOrg::find();

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
            'codhijo' => $this->codhijo,
            'codpadre' => $this->codpadre,
        ]);

        return $dataProvider;
    }
}
