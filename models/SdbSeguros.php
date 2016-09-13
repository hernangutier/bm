<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_seguros}}".
 *
 * @property integer $cod
 * @property string $razon
 * @property integer $codigo
 */
class SdbSeguros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_seguros}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo','razon'], 'required'],
            [['codigo'], 'integer'],
            [['codigo'], 'unique'],
            [['razon'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'razon' => 'Razon',
            'codigo' => 'Código',
        ];
    }
}
