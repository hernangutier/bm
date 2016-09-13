<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_ciudades}}".
 *
 * @property integer $cod
 * @property integer $codmun
 * @property string $codigo
 * @property string $descripcion
 *
 * @property SdbMunicipios $codmun0
 */
class SdbCiudades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_ciudades}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codmun'], 'integer'],
            [['codigo', 'descripcion','codmun'], 'required'],
            [['codigo'], 'string', 'max' => 20],
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
            'codmun' => 'Municipio',
            'codigo' => 'Código',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodmun0()
    {
        return $this->hasOne(SdbMunicipios::className(), ['cod' => 'codmun']);
    }
}
