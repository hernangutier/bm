<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lineas}}".
 *
 * @property string $descripcion
 * @property string $codigo
 * @property integer $cod
 */
class Lineas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lineas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo','descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 80],
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
            'descripcion' => 'Descripción',
            'codigo' => 'Código',
            'cod' => 'Cod',
        ];
    }
}
