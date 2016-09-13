<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_categorias_sub}}".
 *
 * @property integer $cod
 * @property string $codigo
 * @property string $descripcion
 * @property integer $codgen
 *
 * @property SdbCategoriasEsp[] $sdbCategoriasEsps
 * @property SdbCategoriasGeneral $codgen0
 */
class SdbCategoriasSub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_categorias_sub}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion'], 'required'],
            [['codgen'], 'integer'],
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
            'codgen' => 'Categoria General',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbCategoriasEsps()
    {
        return $this->hasMany(SdbCategoriasEsp::className(), ['codsub' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodgen0()
    {
        return $this->hasOne(SdbCategoriasGeneral::className(), ['cod' => 'codgen']);
    }
}
