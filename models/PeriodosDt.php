<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodos_dt".
 *
 * @property integer $cod
 * @property integer $codperiodo
 * @property integer $codbien
 * @property string $costo
 * @property string $descripcion_bien
 * @property integer $codund
 * @property integer $coduser_direct
 * @property integer $coduser_admin
 *
 * @property Bienes $codbien0
 * @property Periodos $codperiodo0
 * @property Responsables $coduserDirect
 * @property Responsables $coduserAdmin
 * @property UnidadesAdmin $codund0
 */
class PeriodosDt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos_dt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codperiodo', 'codbien', 'codund', 'coduser_direct', 'coduser_admin'], 'integer'],
            [['costo'], 'number'],
            [['descripcion_bien'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codperiodo' => 'Codperiodo',
            'codbien' => 'Codbien',
            'costo' => 'Costo',
            'descripcion_bien' => 'Descripcion Bien',
            'codund' => 'Codund',
            'coduser_direct' => 'Coduser Direct',
            'coduser_admin' => 'Coduser Admin',
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
    public function getCodperiodo0()
    {
        return $this->hasOne(Periodos::className(), ['cod' => 'codperiodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoduserDirect()
    {
        return $this->hasOne(Responsables::className(), ['cod' => 'coduser_direct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoduserAdmin()
    {
        return $this->hasOne(Responsables::className(), ['cod' => 'coduser_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodund0()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['cod' => 'codund']);
    }
}
