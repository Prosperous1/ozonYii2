<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $city
 * @property string $street
 * @property int $house_num
 * @property int $apartment_num
 * @property string $comment
 *
 * @property Order[] $orders
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'street', 'house_num', 'apartment_num', 'comment'], 'required'],
            [['house_num', 'apartment_num'], 'integer'],
            [['city', 'street'], 'string', 'max' => 500],
            [['comment'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'Город',
            'street' => 'Улца',
            'house_num' => 'Номер дома',
            'apartment_num' => 'Номер квартиры',
            'comment' => 'Комментарий',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['address' => 'id']);
    }
}
