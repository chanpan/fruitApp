<?php

namespace app\modules\fruitprice\models;

use Yii;

/**
 * This is the model class for table "fruitprices".
 *
 * @property int $id
 * @property string $fruit_name ชื่อผลไม้
 * @property int $fruit_buy ราคารับซื้อ
 * @property string $fruit_unit หน่วย
 * @property string $create_date
 */
class Fruitprices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fruitprices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fruit_name', 'fruit_buy', 'fruit_unit'], 'required'],
            [['fruit_buy'], 'integer'],
            [['create_date'], 'safe'],
            [['fruit_name', 'fruit_unit'], 'string', 'max' => 100],
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
            'fruit_buy' => Yii::t('app', 'ราคารับซื้อ'),
            'fruit_unit' => Yii::t('app', 'หน่วย'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }
}
