<?php

namespace app\modules\expenses\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property string $list รายการ
 * @property int $price จำนวนเงิน
 * @property string $date_st วันที่
 * @property string $description รายละเอียด
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [['price'], 'integer'],
            [['date_st'], 'safe'],
            [['description'], 'string'],
            [['list'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'list' => Yii::t('app', 'รายการ'),
            'price' => Yii::t('app', 'จำนวนเงิน'),
            'date_st' => Yii::t('app', 'วันที่'),
            'description' => Yii::t('app', 'รายละเอียด'),
        ];
    }
}
