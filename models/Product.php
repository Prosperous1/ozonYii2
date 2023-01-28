<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $is_discounted
 * @property string $description
 * @property string $specifications
 * @property string $apply_method
 * @property int $company_id
 * @property float $rating
 * @property string $created_at
 * @property string $modificated_at
 * @property int $created_by
 * @property float $price
 * @property int $category_id
 * @property int $discount
 * @property float $new_price
 *
 * @property Category $category
 * @property Company $company
 * @property User $createdBy
 * @property Favourite[] $favourites
 * @property ProductMedia[] $productMedia
 * @property Products[] $products
 * @property Review[] $reviews
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
            [['title', 'is_discounted', 'description', 'specifications', 'apply_method', 'company_id', 'rating', 'created_at', 'modificated_at', 'created_by', 'price', 'category_id', 'discount', 'new_price'], 'required'],
            [['is_discounted', 'company_id', 'created_by', 'category_id', 'discount'], 'integer'],
            [['description', 'specifications', 'apply_method'], 'string'],
            [['rating', 'price', 'new_price'], 'number'],
            [['created_at', 'modificated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'is_discounted' => 'Наличие скидки',
            'description' => 'Описание',
            'specifications' => 'Характеристики',
            'apply_method' => 'Метод применения',
            'company_id' => 'Компании',
            'rating' => 'Рейтинг',
            'created_at' => 'Создано',
            'modificated_at' => 'Изменено',
            'created_by' => 'Кем создано',
            'price' => 'Цена',
            'category_id' => 'Категории',
            'discount' => 'Скидка',
            'new_price' => 'Цена со скидкой',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductMedia()
    {
        return $this->hasMany(ProductMedia::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['product_id' => 'id']);
    }
}
