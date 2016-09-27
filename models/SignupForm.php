<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;


class SignupForm extends Model
{

      public $email;
      public $password;


      public function rules()
            {
            return [

                  ['email', 'filter', 'filter' => 'trim'],
                  ['email', 'required'],
                  ['email', 'email'],
                  ['email', 'unique',
                  'targetClass' => '\app\models\User',
                  'message' => 'This email address has already been taken.'],
                  ['password', 'required'],
                  ['password', 'string', 'min' => 6],

                  ];
            }


}
