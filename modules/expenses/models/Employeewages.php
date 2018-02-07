<?php

namespace app\modules\expenses\models;

use Yii;

/**
 * This is the model class for table "employeewages".
 *
 * @property int $id
 * @property int $emp_id รหัสพนักงาน
 * @property int $emp_price จำนวนเงิน
 * @property int $number_date จำนวนวัน
 * @property string $date_st จากวันที่
 * @property string $date_en ถึงวันที่
 */
class Employeewages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employeewages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'emp_price','date_st', 'date_en'], 'required'],
            [['emp_id'], 'integer'],
            ['emp_price','integer','message'=>'จำนวนเงินต้องเป็นตัวเลขเท่านั้น'],
            [['date_st', 'date_en'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'emp_id' => Yii::t('app', 'พนักงาน'),
            'emp_price' => Yii::t('app', 'จำนวนเงิน'),
            'date_st' => Yii::t('app', 'จากวันที่'),
            'date_en' => Yii::t('app', 'ถึงวันที่'),
        ];
    }
}
