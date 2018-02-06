<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $id
 * @property string $role_name
 * @property string $role_description
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_description'], 'string'],
            [['role_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'role_name' => Yii::t('app', 'Role Name'),
            'role_description' => Yii::t('app', 'Role Description'),
        ];
    }
}
