<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%unidades_admin}}".
 *
 * @property string $descripcion
 * @property integer $codresp
 * @property string $ubicacion
 * @property string $telefono
 * @property string $codigo
 * @property integer $default_active
 * @property integer $categoria
 * @property integer $disponible_inc
 * @property integer $cod
 * @property integer $codsede
 * @property string $email
 * @property SdbCatUnidadesAdmin $categoria0
 * @property SdbSedes $codsede0
 * @property string $tel_ext
 * @property Responsables $codresp0
 */
class UnidadesAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%unidades_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'ubicacion',  'disponible_inc', 'codsede','categoria','codigo'], 'required'],
            [['codresp', 'default_active', 'categoria', 'disponible_inc', 'codsede'], 'integer'],
            [['descripcion', 'ubicacion'], 'string', 'max' => 150],
            [['telefono'], 'string', 'max' => 70],
            [['codigo'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['tel_ext'], 'string', 'max' => 10],
            [['codigo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'descripcion' => 'Descripción',
            'codresp' => 'Encargado',
            'ubicacion' => 'Ubicación',
            'telefono' => 'Telefono',
            'codigo' => 'Código',
            'default_active' => 'Ubicacion por Defecto',
            'categoria' => 'Categoria (SUDEBIP)',
            'disponible_inc' => 'Funciona como Ubicacion de Entrada',
            'cod' => 'Cod',
            'codsede' => 'Sede de Adscripción',
            'email'=>'e-mail',
            'tel_ext' => 'Extención Telefonica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(SdbCatUnidadesAdmin::className(), ['cod' => 'categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodsede0()
    {
        return $this->hasOne(SdbSedes::className(), ['cod' => 'codsede']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(Responsables::className(), ['codunidad' => 'cod']);
    }



     public function getCodresp0()
    {
        return $this->hasOne(Responsables::className(), ['cod' => 'codresp']);
    }

    public function getAplicaInputHtml(){
      if ($this->disponible_inc==0){
        return '<span class="label label-danger arrowed">NO</span>';
      } else {
        return '<span class="label label-success arrowed-in arrowed-in-right">SI</span>';
      }
    }

}
