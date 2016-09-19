<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sdb_colores".
 *
 * @property integer $cod
 * @property integer $codigo
 * @property string $descripcion
 *
 * @property Bienes[] $bienes
 */
class SdbColores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sdb_colores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion'], 'required'],
            [['codigo'], 'integer'],
            [['descripcion'], 'string'],
            [['codigo'], 'unique'],
            [['descripcion'], 'unique']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['codcolor' => 'cod']);
    }
}
