<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user
 * @property string $type_of_order
 * @property int $address
 * @property int $discount
 * @property int $card_list
 * @property float $total
 *
 * @property Address $address0
 * @property OrderList $orderList
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'type_of_order', 'address', 'discount', 'card_list', 'total'], 'required'],
            [['user', 'address', 'discount', 'card_list'], 'integer'],
            [['type_of_order'], 'string'],
            [['total'], 'number'],
            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::class, 'targetAttribute' => ['address' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'Пользователь',
            'type_of_order' => 'Тип заказа',
            'address' => 'Адрес',
            'discount' => 'Скидка',
            'card_list' => 'Список карт',
            'total' => 'Итог',
        ];
    }

    /**
     * Gets query for [[Address0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress0()
    {
        return $this->hasOne(Address::class, ['id' => 'address']);
    }

    /**
     * Gets query for [[OrderList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderList()
    {
        return $this->hasOne(OrderList::class, ['id' => 'id']);
    }
}
