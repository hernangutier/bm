<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%proveedores}}".
 *
 * @property string $cedrif
 * @property string $razon
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $email
 * @property string $responsable
 * @property string $tlfcontact
 * @property string $observacion
 * @property string $fechacreacion
 * @property integer $activo
 * @property integer $tipo
 * @property integer $cod
 * @property string $tipo_de_proveedor
 * @property string $codigo
 * @property string $otra_descripcion
 * @property string $telefono2
 * @property string $fecha_rnc_vence
 * @property string $fecha_rif_vence
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%proveedores}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedrif', 'razon', 'direccion','codigo','fecha_rnc_vence','fecha_rif_vence'], 'required'],
            [['fechacreacion','fecha_rnc_vence', 'fecha_rif_vence'], 'safe'],
            [['activo', 'tipo'], 'integer'],
            [['tipo_de_proveedor'], 'string'],
            [['cedrif'], 'string', 'max' => 20],
            [['razon'], 'string', 'max' => 100],
            [['direccion', 'responsable', 'observacion'], 'string', 'max' => 400],
            [['telefono', 'fax', 'email', 'tlfcontact'], 'string', 'max' => 70],
            [['codigo'], 'string', 'max' => 10],
            [['otra_descripcion'], 'string', 'max' => 200],
            [['cedrif'], 'unique'],
            [['codigo'], 'unique'],
            [['razon'], 'unique'],
            [['cedrif'], 'unique'],
            ['email', 'email'],
            [['telefono2'], 'string', 'max' => 15],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedrif' => 'R.I.F.',
            'razon' => 'Razon Social',
            'direccion' => 'Dirección',
            'telefono' => 'Telefono Principal',
            'fax' => 'Fax',
            'email' => 'E-mail',
            'responsable' => 'Contacto',
            'tlfcontact' => 'Telf. Contacto',
            'observacion' => 'Observaciónes',
            'fechacreacion' => 'Fecha de Creación',
            'activo' => 'Activo',
            'tipo' => 'Tipo',
            'cod' => 'Cod',
            'tipo_de_proveedor' => 'Tipo De Proveedor',
            'codigo' => 'Código',
            'otra_descripcion' => 'Otra Descripción',
            'telefono2' => 'Telefono Auxiliar',
            'fecha_rnc_vence' => 'Fecha de Vencimiento RNC',
            'fecha_rif_vence' => 'Fecha de Vencimiento RIF',
        ];
    }

    public function getTipo(){
      if ($this->tipo_de_proveedor==0){
        return 'Nacional';
      } else {
        return 'Internacional';
      }
    }

    public function getStatusHtml(){
      if ($this->activo==0){
        return '<span class="label label-danger arrowed">Inhabilitado</span>';
      } else {
        return '<span class="label label-success arrowed-in arrowed-in-right">Habilitado</span>';
      }
    }

}
