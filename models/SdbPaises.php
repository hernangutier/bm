<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_paises}}".
 *
 * @property integer $cod
 * @property integer $codigo
 * @property string $descripcion
 *
 * @property SdbEstados[] $sdbEstados
 * @property SdbSedes[] $sdbSedes
 */
class SdbPaises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_paises}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion'], 'required'],
            [['codigo'], 'integer'],
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
            'codigo' => 'Código',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbEstados()
    {
        return $this->hasMany(SdbEstados::className(), ['codpais' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbSedes()
    {
        return $this->hasMany(SdbSedes::className(), ['codpais' => 'cod']);
    }
}
