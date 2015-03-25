<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%product_image}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $main
 * @property string $title
 * @property string $alt
 *
 * @property Product $product
 */
class ProductImage extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'main'], 'required'],
            [['product_id', 'main'], 'integer'],
            [['title', 'alt'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('product', 'ID'),
            'product_id' => Yii::t('product', 'Product ID'),
            'main' => Yii::t('product', 'Main'),
            'title' => Yii::t('product', 'Title'),
            'alt' => Yii::t('product', 'Alt'),
        ];
    }

    public function getUrl()
    {
        return Yii::$app->urlManagerFrontEnd->baseUrl . '/uploads/products/' . $this->product_id . '/' . $this->id . '.' . $this->extension;
    }

    public function getImage()
    {
        return Html::img($this->getUrl, [
            'title' => $this->title,
            'alt' => $this->alt,
        ]);
    }
}
