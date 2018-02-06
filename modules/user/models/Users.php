<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $create_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','password','email','role'], 'required'],
            [['email'],'email','message'=>'รูปแบบ Email ไม่ถูกต้อง'],
            [['email', 'username', 'create_at','update_at'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'create_at' => Yii::t('app', 'Create At'),
            'role' => Yii::t('app', 'สิทธิ์การใช้งาน'),
        ];
    }
}
