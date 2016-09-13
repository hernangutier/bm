<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_cat_unidades_admin}}".
 *
 * @property integer $cod
 * @property integer $codigo
 * @property string $descripcion
 */
class SdbCatUnidadesAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_cat_unidades_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo','descripcion'], 'required'],
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
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
        ];
    }
}
