<?php

namespace common\models;

use Yii;
use himiklab\sortablegrid\SortableGridBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%slide}}".
 *
 * @property integer $id
 * @property integer $sortOrder
 * @property string $title
 * @property string $body
 */
class Slide extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slide}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['sortOrder'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sortOrder'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('slide', 'ID'),
            'sortOrder' => Yii::t('slide', 'Sort Order'),
            'title' => Yii::t('slide', 'Title'),
            'body' => Yii::t('slide', 'Body'),
        ];
    }
}
