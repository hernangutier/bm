<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_municipios}}".
 *
 * @property integer $cod
 * @property integer $codest
 * @property string $descripcion
 * @property string $codigo
 *
 * @property SdbCiudades[] $sdbCiudades
 * @property SdbEstados $codest0
 * @property SdbParroquias $sdbParroquias
 */
class SdbMunicipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_municipios}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codest', 'descripcion', 'codigo'], 'required'],
            [['codest'], 'integer'],
            [['descripcion'], 'string', 'max' => 200],
            [['codigo'], 'string', 'max' => 20],
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
            'codest' => 'Estado',
            'descripcion' => 'Descripción',
            'codigo' => 'Código',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbCiudades()
    {
        return $this->hasMany(SdbCiudades::className(), ['codmun' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodest0()
    {
        return $this->hasOne(SdbEstados::className(), ['cod' => 'codest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbParroquias()
    {
        return $this->hasOne(SdbParroquias::className(), ['codmun' => 'cod']);
    }
}
