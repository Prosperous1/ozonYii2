<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card_list".
 *
 * @property int $id
 * @property int|null $card_ID
 *
 * @property CardId $card
 * @property User[] $users
 */
class CardList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_ID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_ID' => 'Card ID',
        ];
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(CardId::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['card' => 'id']);
    }
}
