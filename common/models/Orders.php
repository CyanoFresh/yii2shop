<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $status
 * @property integer $user_id
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $message
 * @property string $data
 */
class Orders extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'status', 'user_id', 'email', 'name', 'phone', 'address', 'message', 'data'], 'required'],
            [['date', 'status', 'user_id'], 'integer'],
            [['message', 'data'], 'string'],
            [['email', 'name', 'phone', 'address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('orders', 'ID'),
            'date' => Yii::t('orders', 'Date'),
            'status' => Yii::t('orders', 'Status'),
            'user_id' => Yii::t('orders', 'User ID'),
            'email' => Yii::t('orders', 'Email'),
            'name' => Yii::t('orders', 'Name'),
            'phone' => Yii::t('orders', 'Phone'),
            'address' => Yii::t('orders', 'Address'),
            'message' => Yii::t('orders', 'Message'),
            'data' => Yii::t('orders', 'Data'),
        ];
    }
}
