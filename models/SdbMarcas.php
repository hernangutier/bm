<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sdb_marcas".
 *
 * @property integer $cod
 * @property string $denominacion
 * @property string $fabricante
 *
 * @property SdbModelos[] $sdbModelos
 */
class SdbMarcas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sdb_marcas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['denominacion', 'fabricante'], 'required'],
            [['denominacion'], 'unique'],
            [['denominacion', 'fabricante'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'denominacion' => 'Denominacion',
            'fabricante' => 'Fabricante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbModelos()
    {
        return $this->hasMany(SdbModelos::className(), ['codmarca' => 'cod']);
    }
}
