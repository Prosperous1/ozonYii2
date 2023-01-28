<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $mail
 * @property string $phone
 * @property string $login
 * @property string $password sha256 encrypted pass
 * @property int $city_id
 * @property int $currency_id
 * @property int $sex_id
 * @property string $photo_url
 * @property string $date_of_birth
 * @property string $first_name
 * @property string $last_name
 * @property int|null $cart_id
 * @property int|null $favourite_id
 * @property int|null $orders_id
 *
 * @property Address[] $addresses
 * @property Card[] $cards
 * @property Cart $cart
 * @property City $city
 * @property Company[] $companies
 * @property Currency $currency
 * @property Favourite $favourite
 * @property ManagerList[] $managerLists
 * @property Orders $orders
 * @property Product[] $products
 * @property Review[] $reviews
 * @property Sex $sex
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
            [['mail', 'phone', 'login', 'password', 'city_id', 'sex_id', 'photo_url', 'date_of_birth', 'first_name', 'last_name'], 'required'],
            [['city_id', 'currency_id', 'sex_id', 'cart_id', 'favourite_id', 'orders_id'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['mail', 'login', 'first_name', 'last_name'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 256],
            [['photo_url'], 'string', 'max' => 2000],
            [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sex::class, 'targetAttribute' => ['sex_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['cart_id' => 'id']],
            [['favourite_id'], 'exist', 'skipOnError' => true, 'targetClass' => Favourite::class, 'targetAttribute' => ['favourite_id' => 'id']],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['orders_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mail' => 'Mail',
            'phone' => 'Phone',
            'login' => 'Login',
            'password' => 'sha256 encrypted pass',
            'city_id' => 'City ID',
            'currency_id' => 'Currency ID',
            'sex_id' => 'Sex ID',
            'photo_url' => 'Photo Url',
            'date_of_birth' => 'Date Of Birth',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'cart_id' => 'Cart ID',
            'favourite_id' => 'Favourite ID',
            'orders_id' => 'Orders ID',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Card::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'cart_id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }

    /**
     * Gets query for [[Favourite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourite()
    {
        return $this->hasOne(Favourite::class, ['id' => 'favourite_id']);
    }

    /**
     * Gets query for [[ManagerLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManagerLists()
    {
        return $this->hasMany(ManagerList::class, ['manager_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::class, ['id' => 'orders_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Sex]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Sex::class, ['id' => 'sex_id']);
    }
}
