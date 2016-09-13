<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_parroquias}}".
 *
 * @property integer $cod
 * @property integer $codmun
 * @property string $descripcion
 * @property string $codigo
 *
 * @property SdbMunicipios $codmun0
 */
class SdbParroquias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_parroquias}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codmun'], 'integer'],
            [['descripcion', 'codigo','codmun'], 'required'],
            [['descripcion'], 'string', 'max' => 200],
            [['codigo'], 'string', 'max' => 20],
            [['codigo'], 'unique'],
            
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
            'descripcion' => 'Descripción',
            'codigo' => 'Código',
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
