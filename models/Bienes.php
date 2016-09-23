<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bienes".
 *
 * @property integer $cod
 * @property string $codigo
 * @property string $serial
 * @property integer $cod_ing
 * @property integer $dias_garantia
 * @property integer $codresp_directo
 * @property integer $status
 * @property double $costo
 * @property integer $notasigned
 * @property string $observacion
 * @property integer $isvehicle
 * @property integer $codvehicle
 * @property string $foto
* @property integer $codcolor
 * @property integer $cod_und_actual
 * @property integer $isasigned
 * @property string $descripcion
 * @property string $marca
 * @property integer $codclas
 * @property string $fcreacion
 * @property integer $coduser
 * @property integer $operativo
 * @property integer $tipobien
 * @property integer $codlin
 * @property string $localizacion
 * @property string $fdesinc
 * @property integer $pendientedesinc
 * @property string $undmedida
 * @property integer $aplicaiva
 * @property integer $existe
 * @property integer $codcat
 * @property integer $statusfisical
 * @property integer $disponibilidad
 * @property resource $foto1
 * @property integer $mantenimiento
 * @property integer $estado_uso
 * @property integer $estado_fisico
 * @property string $old_cod
 * @property integer $activo
 * @property boolean $is_colectivo
 * @property boolean $pend_in_mov
 * @property string $motivo_indisponibilidad
 * @property boolean $is_in
 * @property boolean $is_asegurable
 * @property Responsables $codrespDirecto
 * @property Clasificacion $codclas0
 * @property Lineas $codlin0
 * @property SdbCategoriasEsp $codcat0
 * @property UnidadesAdmin $codUndActual
 * @property DesincorporacionesDt[] $desincorporacionesDts
 * @property MovimientosDt[] $movimientosDts
 * @property PeriodosDt[] $periodosDts
 * @property SdbColores $codcolor0
 */
class Bienes extends \yii\db\ActiveRecord
{
  const SCENARIO_MIGRACION = 'edith_migracion';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codigo', 'status', 'costo', 'notasigned', 'isvehicle', 'isasigned', 'tipobien', 'pendientedesinc', 'aplicaiva', 'existe', 'disponibilidad'], 'required'],
            [['cod', 'cod_ing', 'dias_garantia', 'codresp_directo', 'status', 'notasigned', 'isvehicle', 'codvehicle', 'cod_und_actual', 'isasigned', 'codclas', 'coduser', 'operativo', 'tipobien', 'codlin', 'pendientedesinc', 'aplicaiva', 'existe', 'codcat', 'statusfisical', 'disponibilidad', 'mantenimiento', 'estado_uso', 'estado_fisico', 'activo','codcolor'], 'integer'],
            [['costo'], 'number'],
            [['foto', 'descripcion', 'foto1'], 'string'],
            [['fcreacion', 'fdesinc'], 'safe'],
            [['is_colectivo', 'is_in', 'is_asegurable','pend_in_mov'], 'boolean'],
            [['codigo', 'serial'], 'string', 'max' => 50],
            [['codigo', 'serial'], 'string', 'max' => 50],
            [['observacion', 'localizacion', 'motivo_indisponibilidad'], 'string', 'max' => 400],
            [['marca'], 'string', 'max' => 80],
            [['undmedida', 'old_cod'], 'string', 'max' => 20],
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
            'serial' => 'Serial',
            'cod_ing' => 'Cod Ing',
            'dias_garantia' => 'Dias Garantia',
            'codresp_directo' => 'Codresp Directo',
            'status' => 'Status',
            'costo' => 'Costo',
            'notasigned' => 'Notasigned',
            'observacion' => 'Observacion',
            'isvehicle' => 'Isvehicle',
            'codvehicle' => 'Codvehicle',
            'foto' => 'Foto',
            'cod_und_actual' => 'Cod Und Actual',
            'isasigned' => 'Isasigned',
            'descripcion' => 'Descripcion',
            'marca' => 'Marca',
            'codclas' => 'Codclas',
            'fcreacion' => 'Fcreacion',
            'coduser' => 'Coduser',
            'operativo' => 'Operativo',
            'tipobien' => 'Tipobien',
            'codlin' => 'Codlin',
            'localizacion' => 'Localizacion',
            'fdesinc' => 'Fdesinc',
            'pendientedesinc' => 'Pendientedesinc',
            'undmedida' => 'Undmedida',
            'aplicaiva' => 'Aplicaiva',
            'existe' => 'Existe',
            'codcat' => 'Categoria Especifica (SUDEBIP)',
            'statusfisical' => 'Estado Fisico del Bien',
            'disponibilidad' => 'Disponibilidad',
            'foto1' => 'Foto1',
            'mantenimiento' => 'Mantenimiento',
            'estado_uso' => 'Estado Uso (SUDEBIP)',
            'estado_fisico' => 'Estado Fisico',
            'old_cod' => 'Old Cod',
            'activo' => 'Activo o Desincorporado',
            'is_colectivo' => 'Bien de Uso Colectivo',
            'motivo_indisponibilidad' => 'Motivo Indisponibilidad',
            'is_in' => 'Is In',
            'is_asegurable' => 'Es Asegurable',
            'codcolor'=>'Color',
            'pend_in_mov'=>'Pendiente en Movimiento',
            'codmodelo'=>'Modelo',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_MIGRACION] = ['codcolor','codcat','estado_fisico', 'estado_uso','is_colectivo','is_asegurable'];


        return $scenarios;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodclas0()
    {
        return $this->hasOne(Clasificacion::className(), ['cod' => 'codclas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodlin0()
    {
        return $this->hasOne(Lineas::className(), ['cod' => 'codlin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcat0()
    {
        return $this->hasOne(SdbCategoriasEsp::className(), ['cod' => 'codcat']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
   public function getCodrespDirecto()
   {
       return $this->hasOne(Responsables::className(), ['cod' => 'codresp_directo']);
   }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodUndActual()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['cod' => 'cod_und_actual']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporacionesDts()
    {
        return $this->hasMany(DesincorporacionesDt::className(), ['codbien' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientosDts()
    {
        return $this->hasMany(MovimientosDt::className(), ['codbien' => 'cod']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodcolor0()
    {
        return $this->hasOne(SdbColores::className(), ['cod' => 'codcolor']);
    }


    public function getEstadoFisicoHtml(){

        if ($this->estado_fisico==1){
          return '<span class="label label-success arrowed-in arrowed-in-right">Óptimo</span>';
        }
        if ($this->estado_fisico==2){
          return '<span class="label label-info arrowed-right arrowed-in">Regular</span>';
        }
        if ($this->estado_fisico==3){
          return '<span class="label label-danger arrowed">Deteriorado</span>';
        }
        if ($this->estado_fisico==4){
          return '<span class="label label-danger arrowed">Averiado</span>';
        }
        if ($this->estado_fisico==5){
          return '<span class="label label-danger arrowed">Chatarra</span>';
        }
        if ($this->estado_fisico==6){
          return '<span class="label label-danger arrowed">No Operativo</span>';
        }
        if ($this->estado_fisico==7){
          return '<span class="label label-info arrowed">Otra Condición Fisica</span>';
        }

    }


    public static function getPercentBm(){
      $total=Bienes::find(['activo'=>1])->count();
        $bm=Bienes::find()->andFilterWhere(['=', 'activo', 1])->andFilterWhere(['=', 'tipobien', 0])->count();
        return number_format(($bm*100)/$total,2) . " %";
    }

    public static function getPercentBMuso(){
      $total=Bienes::find(['activo'=>1])->count();
        $bm=Bienes::find()->andFilterWhere(['=', 'activo', 1])->andFilterWhere(['=', 'tipobien', 1])->count();
        return number_format(($bm*100)/$total,2) . " %";
    }

    public static function getListSqlActives(){
      $sql="SELECT  * from vw_bienes_activos";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function getListSqlActivesNoAsegurados(){
      $sql="SELECT  * from vw_bienes_no_asegurados";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function getListSqlAsegurables(){
      $sql="SELECT  * from vw_bienes_asegurables";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getTipoBien(){
      if ($this->tipobien==0){
        return 'Bien Mueble';
      } else {
        return 'Bien de Uso';
      }

    }
    public function getEstadoUso(){
      if ($this->estado_uso==1){
        return 'En Uso';
      }
      if ($this->estado_uso==2){
        return 'En Comodato';
      }
      if ($this->estado_uso==3){
        return 'En Arrendamiento';
      }
      if ($this->estado_uso==4){
        return 'En Mantenimiento';
      }
      if ($this->estado_uso==5){
        return 'En Reparación';
      }
      if ($this->estado_uso==6){
        return 'En proceso de disposición';
      }
      if ($this->estado_uso==7){
        return 'En Desuso por Obsolecencia';
      }
      if ($this->estado_uso==8){
        return 'En Desuso por Inservibilidad';
      }
      if ($this->estado_uso==9){
        return 'En Desuso por Obsolecencia e Inservibilidad';
      }
      if ($this->estado_uso==10){
        return 'En Almacen o Deposito para su Asignación';
      }
      if ($this->estado_uso==11){
        return 'Otro Uso';
      }

    }

    public static function getListEstadosUso(){
      return [
            ['id'=>1,'descripcion'=>'En Uso'],
            ['id'=>2,'descripcion'=>'En Comodato'],
            ['id'=>3,'descripcion'=>'En Arrendamiento'],
            ['id'=>4,'descripcion'=>'En Mantenimiento'],
            ['id'=>5,'descripcion'=>'En Reparación'],
            ['id'=>6,'descripcion'=>'En proceso de disposoción'],
            ['id'=>7,'descripcion'=>'En Desuso por Obsolecencia'],
            ['id'=>8,'descripcion'=>'En Desuso por Inservibilidad'],
            ['id'=>9,'descripcion'=>'En Desuso por Obsolecencia e Inservibilidad'],
            ['id'=>10,'descripcion'=>'En Almacen o Deposito para su Asignación'],
            ['id'=>11,'descripcion'=>'Otro Uso'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodosDts()
    {
        return $this->hasMany(PeriodosDt::className(), ['codbien' => 'cod']);
    }
}
