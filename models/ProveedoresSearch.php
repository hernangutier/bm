<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proveedores;

/**
 * ProveedoresSearch represents the model behind the search form about `\app\models\Proveedores`.
 */
class ProveedoresSearch extends Proveedores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedrif', 'razon', 'direccion', 'telefono', 'fax', 'email', 'responsable', 'tlfcontact', 'observacion', 'fechacreacion', 'tipo_de_proveedor', 'codigo', 'otra_descripcion'], 'safe'],
            [['activo', 'tipo', 'cod'], 'integer'],
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
        $query = Proveedores::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' =>20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'fechacreacion' => $this->fechacreacion,
            'activo' => $this->activo,
            'tipo' => $this->tipo,
            'cod' => $this->cod,
        ]);

        $query->andFilterWhere(['like', 'cedrif', $this->cedrif])
            ->andFilterWhere(['like', 'razon', $this->razon])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'responsable', $this->responsable])
            ->andFilterWhere(['like', 'tlfcontact', $this->tlfcontact])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'tipo_de_proveedor', $this->tipo_de_proveedor])
            ->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'otra_descripcion', $this->otra_descripcion]);

        return $dataProvider;
    }
}
