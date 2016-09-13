<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguros".
 *
 * @property integer $cod
 * @property integer $codaseguradora
 * @property string $otra_aseguradora
 * @property string $npoliza
 * @property string $monto
 * @property string $tipo
 * @property integer $moneda
 * @property string $especifique_moneda
 * @property string $f_ini
 * @property string $f_fin
 * @property string $resp_civil
 * @property integer $tipo_cobertura
 * @property string $especifique_tipo_cobertura
 * @property string $descripcion_cobertura
 * @property integer $codbien
 * @property boolean $active
 *
 * @property Bienes $codbien0
* @property SdbSeguros $codaseguradora0
 */
class Seguros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'f_ini', 'f_fin'], 'required'],
            [['cod', 'codaseguradora', 'moneda', 'tipo_cobertura', 'codbien'], 'integer'],
            [['monto'], 'number'],
            [['tipo'], 'string'],
            [['f_ini', 'f_fin'], 'safe'],
            [['active'], 'boolean'],
            [['otra_aseguradora', 'especifique_tipo_cobertura', 'descripcion_cobertura'], 'string', 'max' => 100],
            [['npoliza', 'especifique_moneda'], 'string', 'max' => 30],
            [['resp_civil'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codaseguradora' => 'Compañia Aseguradora',
            'otra_aseguradora' => 'Otra Aseguradora',
            'npoliza' => 'N° de Poliza',
            'monto' => 'Monto Asegurado',
            'tipo' => 'Tipo de Poliza',
            'moneda' => 'Moneda',
            'especifique_moneda' => 'Especifique Moneda',
            'f_ini' => 'Fecha de Inicio de Cobertura',
            'f_fin' => 'Fecha de Vencimiento de la Cobertura',
            'resp_civil' => 'Resp Civil',
            'tipo_cobertura' => 'Tipo Cobertura',
            'especifique_tipo_cobertura' => 'Especifique Tipo Cobertura',
            'descripcion_cobertura' => 'Descripcion Cobertura',
            'codbien' => 'Codbien',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodbien0()
    {
        return $this->hasOne(Bienes::className(), ['cod' => 'codbien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodaseguradora0()
    {
        return $this->hasOne(SdbSeguros::className(), ['cod' => 'codaseguradora']);
    }

}
