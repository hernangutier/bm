<?php

namespace app\models;


use Yii;
use app\models\Bienes;
/**
 * This is the model class for table "movimientos".
 *
 * @property integer $cod
 * @property string $fecha
 * @property string $codund_origen
 * @property string $codund_destino
 * @property string $coduser_origen
 * @property string $coduser_destino
 * @property string $observaciones
 * @property string $coduser
 * @property string $ncontrol
 * @property integer $tipo
 * @property integer $status
 * @property integer $periodo
 * @property integer $estado_uso
 * @property Periodos $periodo0
 * @property Responsables $coduserOrigen
 * @property Responsables $coduserDestino
 * @property UnidadesAdmin $codundOrigen
 * @property UnidadesAdmin $codundDestino
 * @property MovimientosDt[] $movimientosDts
 */

class Movimientos extends \yii\db\ActiveRecord
{
  const SCENARIO_ASIGNAR = 'asignar1';
  const SCENARIO_TRASLADAR = 'trasladar';
  const SCENARIO_DESVINCULAR = 'desvincular';
  const SCENARIO_TRASLADAR_UND = 'traslado_und';
  const SCENARIO_CONFIRMAR = 'confirmar';
  const SCENARIO_PERMUTAR = 'permutar';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimientos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['codund_origen', 'codund_destino', 'coduser_origen', 'coduser_destino', 'coduser', 'tipo','status','estado_uso'], 'integer'],
            [['observaciones'], 'string'],

            [['ncontrol'], 'string', 'max' => 100],
            [['codund_origen','coduser_destino'], 'required', 'on'=> self::SCENARIO_ASIGNAR],
            [['codund_origen','codund_destino'], 'required', 'on'=> self::SCENARIO_TRASLADAR_UND],
            [['coduser_origen','coduser_destino'], 'required', 'on'=> self::SCENARIO_TRASLADAR],
            [['coduser_origen','codund_destino','estado_uso'], 'required', 'on'=> self::SCENARIO_DESVINCULAR],
            ['coduser_origen', 'validateUsers', 'on'=> self::SCENARIO_TRASLADAR],
            ['codund_origen', 'validateUnds', 'on'=> self::SCENARIO_TRASLADAR_UND],
            ['codund_origen', 'validateExistBienesAsignar', 'on'=> self::SCENARIO_ASIGNAR],
            ['codund_origen', 'validateExistBienes', 'on'=> self::SCENARIO_TRASLADAR_UND],
            ['coduser_origen', 'validateBienesUsers', 'on'=> self::SCENARIO_TRASLADAR],
            ['coduser_origen', 'validateBienesUsers', 'on'=> self::SCENARIO_DESVINCULAR],

        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'fecha' => 'Fecha',
            'codund_origen' => 'Origen de los Bienes',
            'codund_destino' => 'Destino de los Bienes',
            'coduser_origen' => 'Usuario a Desasignar Bienes',
            'coduser_destino' => 'Usuario a Asignar',
            'status' => 'Estatus de la Operación',
            'observaciones' => 'Observaciones',
            'coduser' => 'Coduser',
            'ncontrol' => 'Ncontrol',
            'tipo' => 'Tipo',
            'estado_uso' => 'Estado de Uso a Quedar los Bienes...',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ASIGNAR] = ['fecha','codund_origen', 'coduser_destino'];
        $scenarios[self::SCENARIO_TRASLADAR] = ['fecha','coduser_origen', 'coduser_destino'];
        $scenarios[self::SCENARIO_TRASLADAR_UND] = ['fecha','codund_origen', 'codund_destino'];
        $scenarios[self::SCENARIO_DESVINCULAR] = ['fecha','codund_destino','coduser_origen','estado_uso'];
        $scenarios[self::SCENARIO_PERMUTAR] = ['coduser_destino','coduser_origen'];

        return $scenarios;
    }



  public function getListBienesAsignar(){

      $SQL = "SELECT cod,resultado  from vw_bienes_asignar where codund=".$this->codund_origen ;
        return   Yii::$app->db->createCommand( $SQL ) ->queryAll();

  }

  public function getListBienesUser(){


        $SQL = "SELECT cod,resultado  from vw_bienes_user where codresp_directo=".$this->coduser_origen ;
          return   Yii::$app->db->createCommand( $SQL ) ->queryAll();


  }



    public function getListBienes(){
      //------------- Bienes para los Tipo de Movimientos
      if ($this->tipo==0){

          return $this->getListBienesAsignar();
      }
      //-------- Traslados entre Usuarios o Desvinculaciones
      if ($this->tipo==1 || $this->tipo==2) {
        return $this->getListBienesUser();
      }
      //------------ Traslado entre Oficinas
      if ($this->tipo==3){

          return $this->getListBienesAsignar();
      }



    }



    public function getNum(){
      $value=Movimientos::find()->count();
      $value=$value+1;

      $a=str_pad($value, 4,"0", STR_PAD_LEFT);
      return $a;
    }

    public function getStatusHtml(){
      if ($this->status==0){
        return '<span class="label label-info arrowed-right arrowed-in">Pendiente</span>';
      }

      if ($this->status==1){
        return '<span class="label label-success arrowed-in arrowed-in-right">Procesada</span>';
      }

      if ($this->status==2){
        return '<span class="label label-danger arrowed">Anulada</span>';
      }
    }


    public function getTipo(){
      if ($this->tipo==0){
        return 'Asignacion de  Bienes';
      }
      if ($this->tipo==1){
        return 'Traspaso de Bienes entre Usuarios';
      }
      if ($this->tipo==2){
        return 'Desvincular Bienes';
      }
      if ($this->tipo==3){
        return 'Traslado de  Bienes entre Unidades Administrativas';
      }
    }

    public function validateUsers(){
      if ($this->coduser_origen==$this->coduser_destino){
        return $this->addError('coduser_origen','Debe seleccionar Usuarios Distintos');
      }
    }
    public function validateUnds(){
      if ($this->codund_origen==$this->codund_destino){
        return $this->addError('codund_origen','Debe seleccionar Unidades Distintas');
      }
    }


    public function validateExistBienes(){
      if (Bienes::find(['cod_und_actual'=>$this->codund_origen])->count()<=0) {
          return $this->addError('codund_origen','No Existen Bienes en esta Unidad de Origen...' . Bienes::find(['cod_und_actual'=>$this->codund_origen])->count());
      }
    }

    public function validateExistBienesAsignar(){
      if (Bienes::find(['cod_und_actual'=>$this->codund_origen])->andFilterWhere(['=', 'estado_uso', ['6','10']])->count()<=0) {
          return $this->addError('codund_origen','No Existen Bienes en esta Unidad de Origen...');
      }
    }


    public function validateBienesUsers(){
      if ($this->coduserOrigen->getBienes()->count()<=0){
          return $this->addError('coduser_origen','El Usuario de Origen no posee Bienes Asignados');
      }



    }

    public  function getTotals(){
      $SQL = "select sum(bi.costo) from movimientos_dt dt
                  inner join movimientos b
                  on (dt.codmov=b.cod)
                  inner join bienes bi
                  on (dt.codbien=bi.cod)
                  and b.cod=". $this->cod;
        return   Yii::$app->db->createCommand( $SQL ) ->queryScalar();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoduserOrigen()
    {
        return $this->hasOne(Responsables::className(), ['cod' => 'coduser_origen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoduserDestino()
    {
        return $this->hasOne(Responsables::className(), ['cod' => 'coduser_destino']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodundOrigen()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['cod' => 'codund_origen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodundDestino()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['cod' => 'codund_destino']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientosDts()
    {
        return $this->hasMany(MovimientosDt::className(), ['codmov' => 'cod']);
    }
}
