<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desincorporaciones_conceptos".
 *
 * @property integer $cod
 * @property integer $codigo
 * @property string $descripcion
 * @property boolean $aplica_acta
 * @property boolean $aplica_terceros
 * @property integer $tipo
 *
 * @property DesincorporacionesBm[] $desincorporacionesBms
 */
class DesincorporacionesConceptos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desincorporaciones_conceptos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'tipo'], 'integer'],
            [['descripcion'], 'required'],
            [['aplica_acta', 'aplica_terceros'], 'boolean'],
            [['descripcion'], 'string', 'max' => 200],
            [['codigo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'aplica_acta' => 'Requiere N° de Acta de Desincorporación',
            'aplica_terceros' => 'Involucra Informacion de Terceros(Beneficiarios)',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporacionesBms()
    {
        return $this->hasMany(DesincorporacionesBm::className(), ['concepto' => 'cod']);
    }
}
