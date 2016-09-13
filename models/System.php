<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system".
 *
 * @property integer $cod
 * @property string $pass_supervisor
 */
class System extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pass_supervisor'], 'required'],
            [['pass_supervisor'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'pass_supervisor' => 'Pass Supervisor',
        ];
    }
}
