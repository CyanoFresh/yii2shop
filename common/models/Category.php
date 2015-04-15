<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $name
 * @property string $description
 * @property string $meta_description
 * @property string $meta_keywords
 *
 * @property Category $parent
 * @property Category[] $categories
 * @property Product[] $products
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['parent_id'], 'integer'],
            [['description'], 'string'],
            [['slug', 'name', 'meta_description', 'meta_keywords'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/category', 'ID'),
            'parent_id' => Yii::t('common/category', 'Parent Category'),
            'slug' => Yii::t('common/category', 'Slug'),
            'name' => Yii::t('common/category', 'Name'),
            'description' => Yii::t('common/category', 'Description'),
            'meta_description' => Yii::t('common/category', 'Meta Description'),
            'meta_keywords' => Yii::t('common/category', 'Meta Keywords'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => Slug::className(),
                'attribute' => ['name'],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
