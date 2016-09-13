<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "beneficiario_des".
 *
 * @property integer $cod
 * @property string $cedrif
 * @property string $razon
 * @property string $direccion
 * @property string $telefono
 *
 * @property DesincorporacionesBm[] $desincorporacionesBms
 */
class BeneficiarioDes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beneficiario_des';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['razon','cedrif'], 'required'],
            [['cedrif', 'telefono'], 'string', 'max' => 20],
            [['razon'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 400],
            [['cedrif'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'cedrif' => 'Cedula o Rif',
            'razon' => 'Razon Social',
            'direccion' => 'Dirección',
            'telefono' => 'Telefono de Contacto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporacionesBms()
    {
        return $this->hasMany(DesincorporacionesBm::className(), ['codben' => 'cod']);
    }
}
