<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguros_exp".
 *
 * @property integer $cod
 * @property integer $codseg
 * @property string $file
 *
 * @property Seguros $codseg0
 */
class SegurosExp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguros_exp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codseg', 'file'], 'required'],
            [['codseg'], 'integer'],
            [['file'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codseg' => 'Codseg',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodseg0()
    {
        return $this->hasOne(Seguros::className(), ['cod' => 'codseg']);
    }
}
