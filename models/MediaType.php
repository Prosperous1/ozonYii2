<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "media_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property ProductMedia[] $productMedia
 * @property ReviewMedia[] $reviewMedia
 */
class MediaType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[ProductMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductMedia()
    {
        return $this->hasMany(ProductMedia::class, ['media_type_id' => 'id']);
    }

    /**
     * Gets query for [[ReviewMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewMedia()
    {
        return $this->hasMany(ReviewMedia::class, ['media_type_id' => 'id']);
    }
}
