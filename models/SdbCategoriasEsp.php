<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_categorias_esp}}".
 *
 * @property integer $cod
 * @property string $codigo
 * @property string $descripcion
 * @property integer $codsub
 *
 * @property SdbCategoriasSub $codsub0
 */
class SdbCategoriasEsp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_categorias_esp}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion','codsub',], 'required'],
            [['codsub'], 'integer'],
            [['codigo'], 'string', 'max' => 10],
            [['descripcion'], 'string', 'max' => 100],
            
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
            'codsub' => 'Sub-Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodsub0()
    {
        return $this->hasOne(SdbCategoriasSub::className(), ['cod' => 'codsub']);
    }
}
