<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review_id".
 *
 * @property int $id
 * @property string $advantage
 * @property string $disadvantage
 * @property string $description
 * @property string $photo
 * @property string $video
 * @property string $rating
 * @property string $create_at
 * @property string $modified_at
 * @property int $create_by
 * @property int $like
 * @property int $dislike
 *
 * @property ReviewList $reviewList
 */
class ReviewId extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_id';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advantage', 'disadvantage', 'description', 'photo', 'video', 'rating', 'create_at', 'modified_at', 'create_by', 'like', 'dislike'], 'required'],
            [['rating'], 'string'],
            [['create_at', 'modified_at'], 'safe'],
            [['create_by', 'like', 'dislike'], 'integer'],
            [['advantage', 'disadvantage', 'description'], 'string', 'max' => 1000],
            [['photo', 'video'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'advantage' => 'Преимущества',
            'disadvantage' => 'Недостатоки',
            'description' => 'Описание',
            'photo' => 'Фото',
            'video' => 'Видео',
            'rating' => 'Рейтинг',
            'create_at' => 'Когда создано',
            'modified_at' => 'Когда изменено',
            'create_by' => 'Кем создано',
            'like' => 'Нравится',
            'dislike' => 'Ненравится',
        ];
    }

    /**
     * Gets query for [[ReviewList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewList()
    {
        return $this->hasOne(ReviewList::class, ['id' => 'id']);
    }
}
