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
            'email' => 'Email',
            'password' => 'Password',
            'telephone' => 'Telephone',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'city' => 'City',
            'birthday' => 'Birthday',
            'currency' => 'Currency',
            'sex' => 'Sex',
            'photo' => 'Photo',
            'card' => 'Card',
            'role' => 'Role',
            'favourite_list' => 'Favourite List',
            'order_list' => 'Order List',
            'cart' => 'Cart',
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
