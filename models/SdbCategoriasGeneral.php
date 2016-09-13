<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_categorias_general}}".
 *
 * @property integer $cod
 * @property string $codigo
 * @property string $descripcion
 *
 * @property SdbCategoriasSub[] $sdbCategoriasSubs
 */
class SdbCategoriasGeneral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_categorias_general}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion'], 'required'],
            [['codigo'], 'string', 'max' => 10],
            [['descripcion'], 'string', 'max' => 100],
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
    public function getSdbCategoriasSubs()
    {
        return $this->hasMany(SdbCategoriasSub::className(), ['codgen' => 'cod']);
    }
}
