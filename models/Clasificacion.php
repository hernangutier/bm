<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%clasificacion}}".
 *
 * @property string $descripcion
 * @property string $grupo
 * @property string $subgrupo
 * @property string $seccion
 * @property integer $cod

 * @property Bienes[] $bienes
 */
class Clasificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%clasificacion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['descripcion','grupo','subgrupo','seccion'], 'required'],
            [['descripcion'], 'string', 'max' => 150],
            [['grupo', 'subgrupo', 'seccion'], 'string', 'max' => 20],
            [['grupo', 'subgrupo', 'seccion'], 'unique', 'targetAttribute' => ['grupo', 'subgrupo', 'seccion'], 'message' => 'The combination of Grupo, Subgrupo and Seccion has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'descripcion' => 'Descripcion',
            'grupo' => 'Grupo',
            'subgrupo' => 'Subgrupo',
            'seccion' => 'Seccion',
            'cod' => 'Cod',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['codclas' => 'cod']);
    }
}
