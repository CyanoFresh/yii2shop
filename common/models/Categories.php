<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $name
 * @property string $body
 * @property string $description
 * @property string $keywords
 */
class Categories extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'slug', 'name', 'body', 'description', 'keywords'], 'required'],
            [['parent_id'], 'integer'],
            [['body', 'description', 'keywords'], 'string'],
            [['slug', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('categories', 'ID'),
            'parent_id' => Yii::t('categories', 'Parent Category'),
            'slug' => Yii::t('categories', 'Slug'),
            'name' => Yii::t('categories', 'Name'),
            'body' => Yii::t('categories', 'Body'),
            'description' => Yii::t('categories', 'Description'),
            'keywords' => Yii::t('categories', 'Keywords'),
        ];
    }
}
