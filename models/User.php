<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;
use yii\helpers\Security;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $role_id

 * @property integer $user_type_id
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
  const STATUS_ACTIVE = 10;
  const STATUS_PENDIENTE = 20;
  const STATUS_RECHAZADO = 30;
  const STATUS_INHABILITADO = 40;


              public static function tableName()
              {
              return 'user';
              }

              /**
              * behaviors
              */
              public function behaviors()
              {
              return [
              'timestamp' => [
              'class' => 'yii\behaviors\TimestampBehavior',
              'attributes' => [
              ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
              ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
              ],
              'value' => new Expression('NOW()'),
              ],
              ];
              }
              /**
              * validation rules
              */
              public function rules()
              {
              return [
              ['status_id', 'default', 'value' => self::STATUS_ACTIVE],
              ['role_id', 'default', 'value' => 10],
              ['user_type_id', 'default', 'value' => 10],
              ['username',
              ['username',
              ['username',
              ['username',
              'filter', 'filter' => 'trim'],
              'required'],
              'unique'],
              'string', 'min' => 2, 'max' => 255],

              ['email',
              ['email',
              ['email',
              ['email',
              'filter', 'filter' => 'trim'],
              'required'],
              'email'],
              'unique'],
              ];
              }
              /* Your model attribute labels */
              public function attributeLabels()
              {
              return [
              /* Your other attribute labels */
              ];
              }
              /**
              * @findIdentity
              */
              public static function findIdentity($id)
              {
              return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
              }
              /**
              * @findIdentityByAccessToken
              */
              public static function findIdentityByAccessToken($token, $type = null)
              {
              return static::findOne(['auth_key' => $token]);
              }

              /**
              * Finds user by username
              * broken into 2 lines to avoid wordwrapping * @param string $username
              * @return static|null
              */
              public static function findByUsername($email)
              {
              return static::findOne(['email' => $email, 'status' =>
                          self::STATUS_ACTIVE]);
              }
              /**
              * Finds user by password reset token
              *
              * @param string $token password reset token
              * @return static|null
              */
              public static function findByPasswordResetToken($token)
              {
              $expire = Yii::$app->params['user.passwordResetTokenExpire'];
                      $parts = explode('_', $token);
                              $timestamp = (int) end($parts);
                                  if ($timestamp + $expire < time()) {
                                      // token expired
                                      return null;
                                }
                              return static::findOne([
                                  'password_reset_token' => $token,
                                  'status_id' => self::STATUS_ACTIVE,
                              ]);
              }
              /**

              */
              public function getId()
              {
              return $this->getPrimaryKey();
              }
              /**
              * @getAuthKey
              */
              public function getAuthKey()
              {
              return $this->auth_key;
              }
              /**
              * @validateAuthKey
              */
              public function validateAuthKey($authKey)
              {
              return $this->getAuthKey() === $authKey;
              }
              /**
              * Validates password
              *
              * @param string $password password to validate
              * @return boolean if password provided is valid for current user
              */
              public function validatePassword($password)
              {
                  return Yii::$app->security->validatePassword($password, Yii::$app->security->generatePasswordHash($password));
              }
              /**
              * Generates password hash from password and sets it to the model
              *
              * @param string $password
              */
              public function setPassword($password)
              {

                $this->password_hash = Yii::$app->security->generatePasswordHash($password);
              }
              /**
              * Generates "remember me" authentication key
              */
              public function generateAuthKey()
              {
              $this->auth_key = Yii::$app->security->generateRandomString();
              }
              /**
              * Generates new password reset token
              * broken into 2 lines to avoid wordwrapping
              */
              public function generatePasswordResetToken()
              {
              $this->password_reset_token = Yii::$app->security->generateRandomString()
              . '_' . time();
              }

              /**
              * Removes password reset token
              */
              public function removePasswordResetToken()
              {
              $this->password_reset_token = null;
              }



              //------------ Metodos nuevos de la Guia -------------------------
                public function getRole()
                {
                    return $this->hasOne(Role::className(), ['id' => 'role_id']);
                }

                public function getRoleName()
                {
                    return $this->role ? $this->role->role_name : '- No Asignado -';
                }

                                /**
                * get list of roles for dropdown
                */
                public static function getRoleList()
                {
                    $droptions = Role::find()->asArray()->all();
                    return Arrayhelper::map($droptions, 'role_value', 'role_name');
                }
              //----------------------------------------------------------------
}
