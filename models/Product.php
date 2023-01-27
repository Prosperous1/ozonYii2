<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category
 * @property string $name
 * @property string $media
 * @property string $description
 * @property int $company
 * @property string $create_at
 * @property string $modified_at
 * @property string $delete_at
 * @property string $characteristic
 * @property int $flag
 * @property float $old_price
 * @property int $discount
 * @property float $new_price
 * @property int $rating
 * @property int $review
 *
 * @property CategoryList $category0
 * @property CompanyList $company0
 * @property ProductList $productList
 * @property ReviewList $review0
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'name', 'media', 'description', 'company', 'create_at', 'modified_at', 'delete_at', 'characteristic', 'flag', 'old_price', 'discount', 'new_price', 'rating', 'review'], 'required'],
            [['category', 'company', 'flag', 'discount', 'rating', 'review'], 'integer'],
            [['description', 'characteristic'], 'string'],
            [['create_at', 'modified_at', 'delete_at'], 'safe'],
            [['old_price', 'new_price'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['media'], 'string', 'max' => 500],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryList::class, 'targetAttribute' => ['category' => 'id']],
            [['review'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewList::class, 'targetAttribute' => ['review' => 'id']],
            [['company'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyList::class, 'targetAttribute' => ['company' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Категории',
            'name' => 'Имя',
            'media' => 'Медиа',
            'description' => 'Описание',
            'company' => 'Компания',
            'create_at' => 'Когда создано',
            'modified_at' => 'Когда тзменено',
            'delete_at' => 'Когда удалено',
            'characteristic' => 'Характериситики',
            'flag' => 'Flag',
            'old_price' => 'Старая цена',
            'discount' => 'Скидка',
            'new_price' => 'Новая цена',
            'rating' => 'Рейтинг',
            'review' => 'Отзывы',
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(CategoryList::class, ['id' => 'category']);
    }

    /**
     * Gets query for [[Company0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany0()
    {
        return $this->hasOne(CompanyList::class, ['id' => 'company']);
    }

    /**
     * Gets query for [[ProductList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductList()
    {
        return $this->hasOne(ProductList::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[Review0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview0()
    {
        return $this->hasOne(ReviewList::class, ['id' => 'review']);
    }
}
