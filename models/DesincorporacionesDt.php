<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desincorporaciones_dt".
 *
 * @property integer $cod
 * @property integer $coddes
 * @property integer $codbien
 *
 * @property Bienes $codbien0
 * @property DesincorporacionesBm $coddes0
 */
class DesincorporacionesDt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desincorporaciones_dt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coddes', 'codbien'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'coddes' => 'Coddes',
            'codbien' => 'N° de Bien',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodbien0()
    {
        return $this->hasOne(Bienes::className(), ['cod' => 'codbien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoddes0()
    {
        return $this->hasOne(DesincorporacionesBm::className(), ['cod' => 'coddes']);
    }
}
