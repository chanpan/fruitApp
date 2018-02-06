<?php

namespace app\modules\fruit\models;

use Yii;

/**
 * This is the model class for table "fruits".
 *
 * @property int $id
 * @property string $fruit_name
 * @property int $fruit_amount
 * @property string $fruit_unit
 * @property string $fruit_price
 * @property string $fruit_date
 */
class Fruits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fruits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fruit_amount'], 'integer'],
            [['fruit_price','fruit_name','fruit_unit','fruit_amount'], 'required'],
            [['fruit_date'], 'safe'],
            [['fruit_name', 'fruit_unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fruit_name' => Yii::t('app', 'ชื่อผลไม้'),
            'fruit_amount' => Yii::t('app', 'จำนวน'),
            'fruit_unit' => Yii::t('app', 'หน่วย'),
            'fruit_price' => Yii::t('app', 'ราคา'),
            'fruit_date' => Yii::t('app', 'วันที่ซื้อ'),
        ];
    }
}
