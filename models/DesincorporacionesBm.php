<?php

namespace app\models;

use Yii;
use app\models\DesincorporacionesDt;

/**
 * This is the model class for table "desincorporaciones_bm".
 *
 * @property integer $cod
 * @property string $ncontrol
 * @property integer $concepto
 * @property string $fecha_trans
 * @property string $fecha
 * @property integer $periodo
 * @property string $observaciones
 * @property integer $paso
 * @property integer $status
 * @property integer $codben
 * @property string $motivo_nulls
 * @property DesincorporacionesDt[] $desincorporacionesDts
 * @property BeneficiarioDes $codben0
 * @property DesincorporacionesConceptos $concepto0
 * @property Periodos $periodo0
 * @property DesincorporacionesDt[] $desincorporacionesDts
 * @property DesincorporacionesExp[] $desincorporacionesExps
 */
class DesincorporacionesBm extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desincorporaciones_bm';
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['concepto', 'periodo', 'paso', 'status', 'codben'], 'integer'],
          [['fecha_trans', 'fecha', 'fecha_acta'], 'safe'],
          [['fecha'], 'required'],
          [['ncontrol'], 'string', 'max' => 10],
          [['observaciones','motivo_nulls'], 'string', 'max' => 400],
          [['nacta'], 'string', 'max' => 20],
          [['motivo_nulls'], 'required','on' => ['anular']],
          ['nacta', 'validate_submit','on'=>['paso3']],
          ['nacta','required', 'on'=>['paso3']],


        ];
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'ncontrol' => 'N° de Control',
            'concepto' => 'Concepto',
            'fecha_trans' => 'Fecha Trans',
            'fecha' => 'Fecha',
            'periodo' => 'Periodo',
            'observaciones' => 'Observaciones',
            'paso' => 'Paso',
            'status' => 'Estatus de la Operación',
            'motivo_nulls' => 'Motivo de Anulación',
            'nacta'=>'N° de Acta de Desincorporación'
        ];
    }


    public function scenarios()
{
        $scenarios = parent::scenarios();
        $scenarios['aperturar'] = ['tipo', 'fecha'];
        $scenarios['paso3'] = ['nacta', 'status', 'codben','observaciones'];
        return $scenarios;
}

  public function validate_submit(){
    //if ($this->conceptos0->aplica_nacta && is_null($this->nacta)){
      $this->addError('nacta','Debe Suministrar un N° de Acta de Desincorporacion');
    //}
    //if ($this->conceptos0->aplica_terceros && is_null($this->codben)){
      $this->addError('codben','Debe Suministrar los Datos del Beneficiario');
    //}
  }





    public function getNum(){
      $value=DesincorporacionesBm::find()->count();
      $value=$value+1;

      $a=str_pad($value, 4,"0", STR_PAD_LEFT);
      return $a;
    }

    public function getDetalles(){
      return DesincorporacionesDt::find(['coddes'=>$this->cod])->count();

    }






  public function getStatusHtml(){
    if ($this->status==0){
      return '<span class="label label-info arrowed-right arrowed-in">en elaboración</span>';
    }
    if ($this->status==1){
      return '<span class="label arrowed">
																		en espera de confirmación
							</span>';
    }
    if ($this->status==2){
      return '<span class="label label-success arrowed-in arrowed-in-right">Procesada</span>';
    }

    if ($this->status==3){
      return '<span class="label label-danger arrowed">Anulada</span>';
    }
  }

  /**
       * @return \yii\db\ActiveQuery
       */
      public function getCodben0()
      {
          return $this->hasOne(BeneficiarioDes::className(), ['cod' => 'codben']);
      }

      /**
       * @return \yii\db\ActiveQuery
       */
      public function getConcepto0()
      {
          return $this->hasOne(DesincorporacionesConceptos::className(), ['cod' => 'concepto']);
      }

      /**
       * @return \yii\db\ActiveQuery
       */
      public function getPeriodo0()
      {
          return $this->hasOne(Periodos::className(), ['cod' => 'periodo']);
      }

      /**
       * @return \yii\db\ActiveQuery
       */
      public function getDesincorporacionesDts()
      {
          return $this->hasMany(DesincorporacionesDt::className(), ['coddes' => 'cod']);
      }

      /**
       * @return \yii\db\ActiveQuery
       */
      public function getDesincorporacionesExps()
      {
          return $this->hasMany(DesincorporacionesExp::className(), ['coddes' => 'cod']);
      }

      public  function getTotals(){
        $SQL = "select sum(bi.costo) from desincorporaciones_dt dt
                    inner join desincorporaciones_bm b
		                on (dt.coddes=b.cod)
		                inner join bienes bi
		                on (dt.codbien=bi.cod)
		                and b.cod=". $this->cod;
          return   Yii::$app->db->createCommand( $SQL ) ->queryScalar();
      }
}
