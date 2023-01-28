<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $advantage
 * @property string $disadvantage
 * @property string $description
 * @property int $is_approved
 * @property int $likes
 * @property int $dislikes
 * @property string $created_at
 * @property string $modificated_at
 * @property int $created_by
 * @property int $product_id
 *
 * @property User $createdBy
 * @property Product $product
 * @property ReviewMedia[] $reviewMedia
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advantage', 'disadvantage', 'description', 'is_approved', 'likes', 'dislikes', 'created_at', 'modificated_at', 'created_by', 'product_id'], 'required'],
            [['advantage', 'disadvantage', 'description'], 'string'],
            [['is_approved', 'likes', 'dislikes', 'created_by', 'product_id'], 'integer'],
            [['created_at', 'modificated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'advantage' => 'Плюсы',
            'disadvantage' => 'Минусы',
            'description' => 'Описание',
            'is_approved' => 'Проверено',
            'likes' => 'Нравится',
            'dislikes' => 'Не нравится',
            'created_at' => 'Создано',
            'modificated_at' => 'Изменено',
            'created_by' => 'Кем создано',
            'product_id' => 'Продукт',
        ];
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
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[ReviewMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewMedia()
    {
        return $this->hasMany(ReviewMedia::class, ['review_id' => 'id']);
    }
}
