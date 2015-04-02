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
            'id' => Yii::t('order', 'ID'),
            'status' => Yii::t('order', 'Status'),
            'total_cost' => Yii::t('order', 'Total Cost'),
            'date' => Yii::t('order', 'Date'),
            'data' => Yii::t('order', 'Data'),
            'name' => Yii::t('order', 'Name'),
            'email' => Yii::t('order', 'Email'),
            'phone' => Yii::t('order', 'Phone'),
            'message' => Yii::t('order', 'Message'),
        ];
    }

    public function getStatuses()
    {
        return [
            self::STATUS_NEW => Yii::t('order', 'New'),
            self::STATUS_REVIEWED => Yii::t('order', 'Reviewed'),
            self::STATUS_PROCESSED => Yii::t('order', 'Processed'),
        ];
    }

    public function getStatusLabel($status)
    {
        return $this->statuses[$status];
    }
}
