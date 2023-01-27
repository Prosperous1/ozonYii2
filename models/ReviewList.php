<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review_list".
 *
 * @property int $id
 * @property int|null $review_id
 *
 * @property ReviewId $id0
 * @property Product[] $products
 */
class ReviewList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review_id'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewId::class, 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'review_id' => 'Review ID',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(ReviewId::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['review' => 'id']);
    }
}
