<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%status}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 * @property string $background
 *
 * @property Product[] $products
 */
class Status extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'color', 'background'], 'required'],
            [['name', 'color', 'background'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('status', 'ID'),
            'name' => Yii::t('status', 'Name'),
            'color' => Yii::t('status', 'Color'),
            'background' => Yii::t('status', 'Background'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['status_id' => 'id']);
    }
}
