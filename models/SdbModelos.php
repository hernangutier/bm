<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sdb_modelos".
 *
 * @property integer $cod
 * @property string $descripcion
 * @property integer $codmarca
 * @property integer $cod_segun_cat
 *
 * @property Bienes[] $bienes
 * @property SdbCategoriasEsp $codSegunCat
 * @property SdbMarcas $codmarca0
 */
class SdbModelos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sdb_modelos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['codmarca', 'cod_segun_cat'], 'integer'],
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
            'codmarca' => 'Codmarca',
            'cod_segun_cat' => 'Bien Mueble Según Catalogo al que Aplica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['codmodelo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodSegunCat()
    {
        return $this->hasOne(SdbCategoriasEsp::className(), ['cod' => 'cod_segun_cat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodmarca0()
    {
        return $this->hasOne(SdbMarcas::className(), ['cod' => 'codmarca']);
    }
}
