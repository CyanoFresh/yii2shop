<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $status_id
 * @property integer $price
 * @property string $date
 * @property string $slug
 * @property string $name
 * @property string $description
 * @property string $meta_description
 * @property string $meta_keywords
 *
 * @property Category $category
 * @property Status $status
 */
class Product extends ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;

    /**
     * @var \yii\web\UploadedFile file attribute
     */
    public $image;
    /**
     * @var \yii\web\UploadedFile files attribute
     */
    public $images;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'price', 'date', 'name', 'description'], 'required'],
            [['category_id', 'status_id', 'price'], 'integer'],
            [['description'], 'string'],
            [['slug', 'name', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
            [['date'], 'safe'],
            [['image'], 'safe'],
            [['image'], 'image', 'mimeTypes' => 'image/jpeg, image/png', 'extensions'=>'jpg, png'],
            [['image'], 'required', 'on' => 'create'],
            [['images'], 'image', 'maxFiles' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/product', 'ID'),
            'category_id' => Yii::t('common/product', 'Category'),
            'status_id' => Yii::t('common/product', 'Status'),
            'price' => Yii::t('common/product', 'Price'),
            'image' => Yii::t('common/product', 'Image'),
            'images' => Yii::t('common/product', 'Images'),
            'date' => Yii::t('common/product', 'Date'),
            'slug' => Yii::t('common/product', 'Slug'),
            'name' => Yii::t('common/product', 'Name'),
            'description' => Yii::t('common/product', 'Description'),
            'meta_description' => Yii::t('common/product', 'Meta Description'),
            'meta_keywords' => Yii::t('common/product', 'Meta Keywords'),
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
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['item_id' => 'id']);
    }

    /**
     * @param string $urlManager
     * @return string
     */
    public function getMainImage($urlManager = 'urlManager')
    {
        return Yii::$app->{$urlManager}->baseUrl . '/uploads/product/' . $this->id . '/main.jpg';
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }
}
