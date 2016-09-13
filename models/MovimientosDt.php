<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimientos_dt".
 *
 * @property integer $cod
 * @property string $codbien
 * @property string $codmov
 *
 * @property Bienes $codbien0
 * @property Movimientos $codmov0
 */
class MovimientosDt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimientos_dt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codbien', 'codmov'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codbien' => 'Codbien',
            'codmov' => 'Codmov',
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
    public function getCodmov0()
    {
        return $this->hasOne(Movimientos::className(), ['cod' => 'codmov']);
    }
}
