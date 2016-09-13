<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bienes;

/**
 * BienesSearch represents the model behind the search form about `app\models\Bienes`.
 */
class BienesUsoSearch extends Bienes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'cod_ing', 'dias_garantia', 'cod_resp', 'status', 'notasigned', 'isvehicle', 'codvehicle', 'cod_ubic_actual', 'isasigned', 'codclas', 'coduser', 'operativo', 'tipobien', 'codlin', 'pendientedesinc', 'aplicaiva', 'existe', 'codcat', 'statusfisical', 'disponibilidad', 'mantenimiento', 'estado_uso', 'estado_fisico','activo'], 'integer'],
            [['codigo', 'serial', 'observacion', 'foto', 'descripcion', 'marca', 'fcreacion', 'localizacion', 'fdesinc', 'undmedida', 'foto1', 'old_cod'], 'safe'],
            [['costo'], 'number'],
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
        $query = Bienes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => 10,
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
            'cod_ing' => $this->cod_ing,
            'dias_garantia' => $this->dias_garantia,
            'cod_resp' => $this->cod_resp,
            'status' => $this->status,
            'costo' => $this->costo,
            'notasigned' => $this->notasigned,
            'isvehicle' => $this->isvehicle,
            'codvehicle' => $this->codvehicle,
            'cod_ubic_actual' => $this->cod_ubic_actual,
            'isasigned' => $this->isasigned,
            'codclas' => $this->codclas,
            'fcreacion' => $this->fcreacion,
            'coduser' => $this->coduser,
            'operativo' => $this->operativo,
            'tipobien' => '1',
            'codlin' => $this->codlin,
            'fdesinc' => $this->fdesinc,
            'pendientedesinc' => $this->pendientedesinc,
            'aplicaiva' => $this->aplicaiva,
            'existe' => $this->existe,
            'codcat' => $this->codcat,
            'statusfisical' => $this->statusfisical,
            'disponibilidad' => $this->disponibilidad,
            'mantenimiento' => $this->mantenimiento,
            'estado_uso' => $this->estado_uso,
            'estado_fisico' => $this->estado_fisico,
            'activo' => '1',
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'localizacion', $this->localizacion])
            ->andFilterWhere(['like', 'undmedida', $this->undmedida])
            ->andFilterWhere(['like', 'foto1', $this->foto1])
            ->andFilterWhere(['like', 'old_cod', $this->old_cod]);

        return $dataProvider;
    }
}
