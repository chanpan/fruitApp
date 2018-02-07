<?php

namespace app\modules\employee\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $cid หมายเลขบัตรประชาชน
 * @property string $name ชื่อ-นามสกุล
 * @property string $address ที่อยู่
 * @property string $tel เบอร์โทรศัพท์
 * @property int $wage ค่าจ้าง
 * @property string $unit วัน/เดือน
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'name', 'address', 'tel', 'wage', 'unit'], 'required'],
            [['address'], 'string'],
            [['wage'], 'integer'],
            [['cid'], 'string', 'max' => 13],
            [['name', 'unit'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cid' => Yii::t('app', 'หมายเลขบัตรประชาชน'),
            'name' => Yii::t('app', 'ชื่อ-นามสกุล'),
            'address' => Yii::t('app', 'ที่อยู่'),
            'tel' => Yii::t('app', 'เบอร์โทรศัพท์'),
            'wage' => Yii::t('app', 'ค่าจ้าง'),
            'unit' => Yii::t('app', 'วัน/เดือน'),
        ];
    }
}
