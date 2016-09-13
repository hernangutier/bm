<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodos".
 *
 * @property integer $cod
 * @property string $descripcion
 * @property string $fini
 * @property string $fclose
 * @property boolean $status
 * @property string $saldo_bm_ini
 * @property string $saldo_bu_ini
 * @property string $saldo_in_bm
 * @property string $saldo_in_bu
 *
 * @property DesincorporacionesBm[] $desincorporacionesBms
 * @property PeriodosDt[] $periodosDts
 */
class Periodos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fini', 'fclose'], 'safe'],
            [['status'], 'boolean'],
            [['saldo_bm_ini', 'saldo_bu_ini', 'saldo_in_bm', 'saldo_in_bu'], 'number'],
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'descripcion' => 'Descripcion',
            'fini' => 'Fini',
            'fclose' => 'Fclose',
            'status' => 'Status',
            'saldo_bm_ini' => 'Saldo Bm Ini',
            'saldo_bu_ini' => 'Saldo Bu Ini',
            'saldo_in_bm' => 'Saldo In Bm',
            'saldo_in_bu' => 'Saldo In Bu',
        ];
    }


    public static function getActive(){
      return Periodos::findOne(['status'=>true]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporacionesBms()
    {
        return $this->hasMany(DesincorporacionesBm::className(), ['periodo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodosDts()
    {
        return $this->hasMany(PeriodosDt::className(), ['codperiodo' => 'cod']);
    }
}
