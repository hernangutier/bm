<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguros_exp".
 *
 * @property integer $cod
 * @property integer $codseg
 * @property string $filename
 * @property string $titulo
 *
 * @property Seguros $codseg0
 */
class SegurosExp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
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
            [['codseg', 'filename','titulo'], 'required'],
            [['codseg'], 'integer'],
            [['filename'], 'string', 'max' => 100],
            [['file'],'file'],
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
            'filename' => 'Archivo Adjunto',
            'titulo' => 'Titulo o Descripción',
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
