<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $total_cost
 * @property string $date
 * @property string $data
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 */
class Order extends ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_REVIEWED = 2;
    const STATUS_PROCESSED = 3;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'total_cost', 'date', 'data', 'name', 'phone'], 'required'],
            [['status', 'total_cost'], 'integer'],
            [['date'], 'safe'],
            [['data', 'message'], 'string'],
            [['name', 'email', 'phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/order', 'ID'),
            'status' => Yii::t('common/order', 'Status'),
            'total_cost' => Yii::t('common/order', 'Total Cost'),
            'date' => Yii::t('common/order', 'Date'),
            'data' => Yii::t('common/order', 'Data'),
            'name' => Yii::t('common/order', 'Name'),
            'email' => Yii::t('common/order', 'Email'),
            'phone' => Yii::t('common/order', 'Phone'),
            'message' => Yii::t('common/order', 'Message'),
        ];
    }

    public function getStatuses()
    {
        return [
            self::STATUS_NEW => Yii::t('common/order', 'New'),
            self::STATUS_REVIEWED => Yii::t('common/order', 'Reviewed'),
            self::STATUS_PROCESSED => Yii::t('common/order', 'Processed'),
        ];
    }

    public function getStatusLabel($status)
    {
        return $this->statuses[$status];
    }
}
