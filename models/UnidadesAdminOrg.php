<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%unidades_admin_org}}".
 *
 * @property integer $cod
 * @property integer $codhijo
 * @property integer $codpadre
 *
 * @property UnidadesAdmin $codhijo0
 * @property UnidadesAdmin $codpadre0
 */
class UnidadesAdminOrg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%unidades_admin_org}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codhijo', 'codpadre'], 'required'],
            [['codhijo', 'codpadre'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codhijo' => 'Codhijo',
            'codpadre' => 'Dependencia Adscrita',
        ];
    }


    public function getListUnidades(){
      return UnidadesAdmin::find()->andFilterWhere(['<>', 'cod', $this->codhijo])->all();
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodhijo0()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['cod' => 'codhijo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodpadre0()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['cod' => 'codpadre']);
    }
}
