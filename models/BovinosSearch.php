<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bovinos;

/**
 * BovinosSearch represents the model behind the search form about `app\models\Bovinos`.
 */
class BovinosSearch extends Bovinos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codbov', 'fnac', 'fcreacion', 'sexo', 'foto', 'fingreso', 'caracteristicas', 'parto_observaciones'], 'safe'],
            [['codraza', 'codganaderia', 'codcat_actual', 'codcat_ingreso', 'codcat_futura', 'codrebano', 'tipo_ingreso', 'peso_nacer', 'cod', 'codgrupo', 'status_fisiologico', 'programa_reproductivo', 'color', 'codpalp'], 'integer'],
            [['status', 'isdescartable'], 'boolean'],
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
        $query = Bovinos::find();

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
            'fnac' => $this->fnac,
            'fcreacion' => $this->fcreacion,
            'codraza' => $this->codraza,
            'codganaderia' => $this->codganaderia,
            'codcat_actual' => $this->codcat_actual,
            'codcat_ingreso' => $this->codcat_ingreso,
            'codcat_futura' => $this->codcat_futura,
            'codrebano' => $this->codrebano,
            'status' => $this->status,
            'tipo_ingreso' => $this->tipo_ingreso,
            'fingreso' => $this->fingreso,
            'peso_nacer' => $this->peso_nacer,
            'cod' => $this->cod,
            'codgrupo' => $this->codgrupo,
            'status_fisiologico' => $this->status_fisiologico,
            'programa_reproductivo' => $this->programa_reproductivo,
            'color' => $this->color,
            'isdescartable' => $this->isdescartable,
            'codpalp' => $this->codpalp,
        ]);

        $query->andFilterWhere(['like', 'codbov', $this->codbov])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'caracteristicas', $this->caracteristicas])
            ->andFilterWhere(['like', 'parto_observaciones', $this->parto_observaciones]);

        return $dataProvider;
    }
}
