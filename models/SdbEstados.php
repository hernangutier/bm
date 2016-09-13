<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_estados}}".
 *
 * @property integer $cod
 * @property integer $codigo
 * @property string $descripcion
 * @property integer $codpais
 *
 * @property SdbPaises $codpais0
 * @property SdbMunicipios[] $sdbMunicipios
 */
class SdbEstados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_estados}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion'], 'required'],
            [['codigo', 'codpais'], 'integer'],
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
            'codpais' => 'Pais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodpais0()
    {
        return $this->hasOne(SdbPaises::className(), ['cod' => 'codpais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbMunicipios()
    {
        return $this->hasMany(SdbMunicipios::className(), ['codest' => 'cod']);
    }
}
