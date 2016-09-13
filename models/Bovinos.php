<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bovinos".
 *
 * @property string $codbov
 * @property string $fnac
 * @property string $fcreacion
 * @property string $sexo
 * @property integer $codraza
 * @property integer $codganaderia
 * @property integer $codcat_actual
 * @property integer $codcat_ingreso
 * @property integer $codcat_futura
 * @property string $foto
 * @property integer $codrebano
 * @property boolean $status
 * @property integer $tipo_ingreso
 * @property string $fingreso
 * @property integer $peso_nacer
 * @property integer $cod
 * @property integer $codgrupo
 * @property integer $status_fisiologico
 * @property integer $programa_reproductivo
 * @property integer $color
 * @property string $caracteristicas
 * @property boolean $isdescartable
 * @property string $parto_observaciones
 * @property integer $codpalp
 *
 * @property BovinosCategoria $codcatActual
 * @property BovinosCategoria $codcatIngreso
 * @property BovinosCategoria $codcatFutura
 * @property BovinosColores $color0
 * @property BovinosRazas $codraza0
 * @property BovinosRebanos $codrebano0
 * @property GruposToros $codgrupo0
 * @property Servicios $codpalp0
 * @property Desincorporaciones[] $desincorporaciones
 * @property Geneologia $geneologia
 * @property Geneologia[] $geneologias
 * @property Geneologia[] $geneologias0
 * @property RegistroPesos[] $registroPesos
 * @property Sanidad[] $sanidads
 * @property Servicios[] $servicios
 * @property Servicios[] $servicios0
 * @property VentaLotesDetal[] $ventaLotesDetals
 */
class Bovinos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bovinos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fnac', 'sexo'], 'required'],
            [['fnac', 'fcreacion', 'fingreso'], 'safe'],
            [['codraza', 'codganaderia', 'codcat_actual', 'codcat_ingreso', 'codcat_futura', 'codrebano', 'tipo_ingreso', 'peso_nacer', 'codgrupo', 'status_fisiologico', 'programa_reproductivo', 'color', 'codpalp'], 'integer'],
            [['status', 'isdescartable'], 'boolean'],
            [['codbov'], 'string', 'max' => 50],
            [['sexo'], 'string', 'max' => 1],
            [['foto', 'caracteristicas'], 'string', 'max' => 200],
            [['parto_observaciones'], 'string', 'max' => 400]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codbov' => 'Codbov',
            'fnac' => 'Fnac',
            'fcreacion' => 'Fcreacion',
            'sexo' => 'Sexo',
            'codraza' => 'Codraza',
            'codganaderia' => 'Codganaderia',
            'codcat_actual' => 'Codcat Actual',
            'codcat_ingreso' => 'Codcat Ingreso',
            'codcat_futura' => 'Codcat Futura',
            'foto' => 'Foto',
            'codrebano' => 'Codrebano',
            'status' => 'Status',
            'tipo_ingreso' => 'Tipo Ingreso',
            'fingreso' => 'Fingreso',
            'peso_nacer' => 'Peso Nacer',
            'cod' => 'Cod',
            'codgrupo' => 'Codgrupo',
            'status_fisiologico' => 'Status Fisiologico',
            'programa_reproductivo' => 'Programa Reproductivo',
            'color' => 'Color',
            'caracteristicas' => 'Caracteristicas',
            'isdescartable' => 'Isdescartable',
            'parto_observaciones' => 'Parto Observaciones',
            'codpalp' => 'Codpalp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcatActual()
    {
        return $this->hasOne(BovinosCategoria::className(), ['cod' => 'codcat_actual']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcatIngreso()
    {
        return $this->hasOne(BovinosCategoria::className(), ['cod' => 'codcat_ingreso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcatFutura()
    {
        return $this->hasOne(BovinosCategoria::className(), ['cod' => 'codcat_futura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor0()
    {
        return $this->hasOne(BovinosColores::className(), ['cod' => 'color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodraza0()
    {
        return $this->hasOne(BovinosRazas::className(), ['cod' => 'codraza']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodrebano0()
    {
        return $this->hasOne(BovinosRebanos::className(), ['cod' => 'codrebano']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodgrupo0()
    {
        return $this->hasOne(GruposToros::className(), ['cod' => 'codgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodpalp0()
    {
        return $this->hasOne(Servicios::className(), ['cod' => 'codpalp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporaciones()
    {
        return $this->hasMany(Desincorporaciones::className(), ['codbov' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneologia()
    {
        return $this->hasOne(Geneologia::className(), ['codhijo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneologias()
    {
        return $this->hasMany(Geneologia::className(), ['codmadre' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneologias0()
    {
        return $this->hasMany(Geneologia::className(), ['codpadre' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroPesos()
    {
        return $this->hasMany(RegistroPesos::className(), ['codbov' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSanidads()
    {
        return $this->hasMany(Sanidad::className(), ['codbov' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicios()
    {
        return $this->hasMany(Servicios::className(), ['codbov' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicios0()
    {
        return $this->hasMany(Servicios::className(), ['codtoro' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaLotesDetals()
    {
        return $this->hasMany(VentaLotesDetal::className(), ['codbov' => 'cod']);
    }
}
