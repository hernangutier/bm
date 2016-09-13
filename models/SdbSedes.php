<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sdb_sedes}}".
 *
 * @property integer $cod
 * @property string $codigo
 * @property string $descripcion
 * @property string $localizacion
 * @property integer $codpais
 * @property string $otro_pais
 * @property integer $codparro
 * @property integer $codciudad
 * @property string $otra_ciudad
 * @property string $urbanizacion
 * @property string $calle_av
 * @property string $casa_edif
 * @property string $piso
 * @property integer $tipo
 * @property integer $codest
 * @property integer $codmun
 *
 * @property SdbEstados $codest0
 * @property SdbMunicipios $codmun0
 * @property SdbPaises $codpais0
 * @property SdbSedesTipos $tipo0
 * @property UnidadesAdmin[] $unidadesAdmins
 */
class SdbSedes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sdb_sedes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codpais', 'codparro', 'codciudad', 'tipo',  'codmun'], 'integer'],
            [['tipo', 'codest', 'codmun'], 'required'],
            [['codigo', 'piso'], 'string', 'max' => 10],
            [['descripcion', 'localizacion', 'otra_ciudad', 'urbanizacion', 'calle_av', 'casa_edif'], 'string', 'max' => 200],
            [['otro_pais'], 'string', 'max' => 100],
            [['codigo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'localizacion' => 'Localizacion',
            'codpais' => 'Pais',
            'otro_pais' => 'Otro Pais',
            'codparro' => 'Parroquia',
            'codciudad' => 'Ciudad',
            'otra_ciudad' => 'Otra Ciudad',
            'urbanizacion' => 'Urbanizacion',
            'calle_av' => 'Calle Av',
            'casa_edif' => 'Casa Edif',
            'piso' => 'Piso',
            'tipo' => 'Tipo',
            'codest' => 'Estado',
            'codmun' => 'Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodest0()
    {
        return $this->hasOne(SdbEstados::className(), ['cod' => 'codest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodmun0()
    {
        return $this->hasOne(SdbMunicipios::className(), ['cod' => 'codmun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodpais0()
    {
        return $this->hasOne(SdbPaises::className(), ['cod' => 'codpais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(SdbSedesTipos::className(), ['cod' => 'tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadesAdmins()
    {
        return $this->hasMany(UnidadesAdmin::className(), ['codsede' => 'cod']);
    }
}
