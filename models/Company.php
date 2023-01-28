<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $title
 * @property int $inn
 * @property int $photo_url
 * @property string $created_at
 * @property string $modificated_at
 * @property int $created_by
 * @property int $manager_list_id
 * @property int $products_id
 *
 * @property User $createdBy
 * @property ManagerList $managerList
 * @property Products $products
 * @property Product[] $products0
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'inn', 'photo_url', 'created_at', 'modificated_at', 'created_by', 'manager_list_id', 'products_id'], 'required'],
            [['title', 'inn', 'photo_url', 'created_by', 'manager_list_id', 'products_id'], 'integer'],
            [['created_at', 'modificated_at'], 'safe'],
            [['manager_list_id'], 'exist', 'skipOnError' => true, 'targetClass' => ManagerList::class, 'targetAttribute' => ['manager_list_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['products_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'inn' => 'Inn',
            'photo_url' => 'Photo Url',
            'created_at' => 'Created At',
            'modificated_at' => 'Modificated At',
            'created_by' => 'Created By',
            'manager_list_id' => 'Manager List ID',
            'products_id' => 'Products ID',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[ManagerList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManagerList()
    {
        return $this->hasOne(ManagerList::class, ['id' => 'manager_list_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::class, ['id' => 'products_id']);
    }

    /**
     * Gets query for [[Products0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts0()
    {
        return $this->hasMany(Product::class, ['company_id' => 'id']);
    }
}
