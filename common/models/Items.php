<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use Zelenin\yii\behaviors\Slug;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%items}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $slug
 * @property string $name
 * @property string $short
 * @property string $full
 * @property string $description
 * @property string $keywords
 */
class Items extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'short', 'full', 'description', 'keywords'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['short', 'full', 'description', 'keywords'], 'string'],
            [['slug', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('items', 'ID'),
            'category_id' => Yii::t('items', 'Category ID'),
            'created_at' => Yii::t('items', 'Created At'),
            'updated_at' => Yii::t('items', 'Updated At'),
            'slug' => Yii::t('items', 'Slug'),
            'name' => Yii::t('items', 'Name'),
            'short' => Yii::t('items', 'Short'),
            'full' => Yii::t('items', 'Full'),
            'description' => Yii::t('items', 'Description'),
            'keywords' => Yii::t('items', 'Keywords'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'slug' => [
                'class' => Slug::className(),
            ]
        ];
    }
}
