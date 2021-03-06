<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguros".
 *
 * @property integer $cod
 * @property integer $codaseguradora
 * @property string $otra_aseguradora
 * @property string $npoliza
 * @property string $monto
 * @property string $tipo
 * @property integer $moneda
 * @property string $especifique_moneda
 * @property string $f_ini
 * @property string $f_fin
 * @property string $resp_civil
 * @property integer $tipo_cobertura
 * @property string $especifique_tipo_cobertura
 * @property string $descripcion_cobertura
 * @property integer $codbien
 * @property integer $status
* @property string $observaciones
 *
 * @property Bienes $codbien0
* @property SdbSeguros $codaseguradora0
* @property SegurosExp[] $segurosExps
 */
class Seguros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     const SCENARIO_ANULAR = 'anular';


    public static function tableName()
    {
        return 'seguros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_ini', 'f_fin','codaseguradora','monto','npoliza','codbien'], 'required'],
            [['cod','status', 'codaseguradora', 'moneda', 'tipo_cobertura', 'codbien'], 'integer'],
            [['monto'], 'number'],
            [['tipo'], 'string'],


            [['otra_aseguradora', 'especifique_tipo_cobertura', 'descripcion_cobertura'], 'string', 'max' => 100],
            [['npoliza', 'especifique_moneda'], 'string', 'max' => 30],
            [['resp_civil'], 'string', 'max' => 1],
            ['monto', 'validateMonto'],
            [['observaciones'], 'string', 'max' => 400],
            [['observaciones'], 'required', 'on'=> self::SCENARIO_ANULAR],
            ['f_fin', 'validateFechas'],

        ];
    }


    public function validateFechas(){
      if ($this->f_ini>=$this->f_fin){
        return $this->addError('f_fin','La Fecha de Vencimiento invalida...');
      }
    }

    

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_ANULAR] = ['observaciones'];

        return $scenarios;
    }


    public function getStatusHtml(){
      if ($this->status==0){
        return '<span class="label label-success arrowed-in arrowed-in-right">Vigente</span>';
      }
      if ($this->status==1){
        return '<span class="label label-warning arrowed">Vencida</span>';
      }
      if ($this->status==2){
        return '<span class="label label-danger arrowed">Anulada</span>';
      }

    }

    public function getVigenciaHtml(){

        if ($this->f_fin>date ("Y-m-d")){
          return '<span class="label label-success arrowed-in arrowed-in-right">Vigente</span>';
        } else {
          return '<span class="label label-danger arrowed">Vencida</span>';
        }

    }

    public function getTipoCobertura(){
      if ($this->tipo_cobertura==1){
        return 'Total';
      }
      if ($this->tipo_cobertura==2){
        return 'Parcial';
      }
      if ($this->tipo_cobertura==3){
        return 'Otro Tipo de Cobertura';
      }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'codaseguradora' => 'Compañia Aseguradora',
            'otra_aseguradora' => 'Otra Aseguradora',
            'npoliza' => 'N° de Poliza',
            'monto' => 'Monto Asegurado',
            'tipo' => 'Tipo de Poliza',
            'moneda' => 'Moneda',
            'especifique_moneda' => 'Especifique Moneda',
            'f_ini' => 'Fecha de Inicio de Cobertura',
            'f_fin' => 'Fecha de Vencimiento de la Cobertura',
            'resp_civil' => 'Resp Civil',
            'tipo_cobertura' => 'Tipo Cobertura',
            'especifique_tipo_cobertura' => 'Especifique Tipo Cobertura',
            'descripcion_cobertura' => 'Descripcion Cobertura',
            'codbien' => 'Bien Mueble a Asegurar',
            'status' => 'Estado de la Poliza',
            'observaciones' => 'Observaciones',
        ];
    }

    public function validateMonto(){
      if ($this->monto<=0){
        return $this->addError('monto','Monto Invalido');
      }
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
    public function getCodaseguradora0()
    {
        return $this->hasOne(SdbSeguros::className(), ['cod' => 'codaseguradora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegurosExps()
    {
        return $this->hasMany(SegurosExp::className(), ['codseg' => 'cod']);
    }

}
