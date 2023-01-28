<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property int $number
 * @property string $date_end
 * @property string $owner_name
 * @property int $is_default
 * @property int $user_id
 *
 * @property Order[] $orders
 * @property User $user
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'date_end', 'owner_name', 'is_default', 'user_id'], 'required'],
            [['number', 'is_default', 'user_id'], 'integer'],
            [['date_end'], 'safe'],
            [['owner_name'], 'string', 'max' => 40],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер',
            'date_end' => 'Дата окончание',
            'owner_name' => 'Имя держателя',
            'is_default' => 'По умолчанию',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['card_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
