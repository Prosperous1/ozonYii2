<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $telephone
 * @property string $first_name
 * @property string $last_name
 * @property string $city
 * @property string $birthday
 * @property int $currency
 * @property string $sex
 * @property string $photo
 * @property int $card
 * @property int $role
 * @property int $favourite_list
 * @property int $order_list
 * @property int $cart
 *
 * @property CardList $card0
 * @property CartItem $cart0
 * @property CurrencyList $currency0
 * @property ProductList $favouriteList
 * @property OrderList $orderList
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'telephone', 'first_name', 'last_name', 'city', 'birthday', 'currency', 'sex', 'photo', 'card', 'role', 'favourite_list', 'order_list', 'cart'], 'required'],
            [['telephone', 'currency', 'card', 'role', 'favourite_list', 'order_list', 'cart'], 'integer'],
            [['birthday'], 'safe'],
            [['sex'], 'string'],
            [['email', 'password', 'photo'], 'string', 'max' => 500],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['city'], 'string', 'max' => 90],
            [['card'], 'exist', 'skipOnError' => true, 'targetClass' => CardList::class, 'targetAttribute' => ['card' => 'id']],
            [['currency'], 'exist', 'skipOnError' => true, 'targetClass' => CurrencyList::class, 'targetAttribute' => ['currency' => 'id']],
            [['favourite_list'], 'exist', 'skipOnError' => true, 'targetClass' => ProductList::class, 'targetAttribute' => ['favourite_list' => 'id']],
            [['order_list'], 'exist', 'skipOnError' => true, 'targetClass' => OrderList::class, 'targetAttribute' => ['order_list' => 'id']],
            [['cart'], 'exist', 'skipOnError' => true, 'targetClass' => CartItem::class, 'targetAttribute' => ['cart' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Почта',
            'password' => 'Пароль',
            'telephone' => 'Телефон',
            'first_name' => 'Фамилия',
            'last_name' => 'Имя',
            'city' => 'Город',
            'birthday' => 'День рождения',
            'currency' => 'Валюта',
            'sex' => 'Пол',
            'photo' => 'Фото',
            'card' => 'Карта',
            'role' => 'Роль',
            'favourite_list' => 'Избранное',
            'order_list' => 'Заказы',
            'cart' => 'Корзина',
        ];
    }

    /**
     * Gets query for [[Card0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard0()
    {
        return $this->hasOne(CardList::class, ['id' => 'card']);
    }

    /**
     * Gets query for [[Cart0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart0()
    {
        return $this->hasOne(CartItem::class, ['id' => 'cart']);
    }

    /**
     * Gets query for [[Currency0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency0()
    {
        return $this->hasOne(CurrencyList::class, ['id' => 'currency']);
    }

    /**
     * Gets query for [[FavouriteList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavouriteList()
    {
        return $this->hasOne(ProductList::class, ['id' => 'favourite_list']);
    }

    /**
     * Gets query for [[OrderList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderList()
    {
        return $this->hasOne(OrderList::class, ['id' => 'order_list']);
    }
}
