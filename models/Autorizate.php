<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\System;

/**
 * LoginForm is the model behind the login form.
 */
class Autorizate extends Model
{

    public $password;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['password'], 'required'],
            ['password', 'validatePass'],

        ];
    }

    public function validatePass(){
      if (System::findOne(1)->pass_supervisor!=$this->password){
          $this->addError('password', 'Clave Incorrecta...');
      }
    }

    public function attributeLabels()
    {
        return [

           'password'=>'Contraseña de Autorización',


        ];

    }





}
