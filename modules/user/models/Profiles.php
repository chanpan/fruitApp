<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property integer $user_id
 * @property string $fname
 * @property string $lname
 * @property string $sex
 * @property string $address
 * @property string $tel
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname','lname','tel'], 'required'],
            [['address'], 'string'],
            [['fname', 'lname', 'tel'], 'string', 'max' => 100],
           
            [['sex'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'fname' => Yii::t('app', 'ชื่อ'),
            'lname' => Yii::t('app', 'นามสกุล'),
            'sex' => Yii::t('app', 'เพศ'),
            'address' => Yii::t('app', 'ที่อยู่'),
            'tel' => Yii::t('app', 'เบอร์โทรศัพท์'),
        ];
    }
}
