<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desincorporaciones_exp".
 *
 * @property integer $cod
 * @property string $titulo
 * @property integer $coddes
 * @property string $filename
 *
 * @property DesincorporacionesBm $coddes0
 */
class DesincorporacionesExp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desincorporaciones_exp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['coddes'], 'integer'],
            [['titulo', 'filename'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'titulo' => 'Titulo',
            'coddes' => 'Coddes',
            'filename' => 'Filename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoddes0()
    {
        return $this->hasOne(DesincorporacionesBm::className(), ['cod' => 'coddes']);
    }
}
