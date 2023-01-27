<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $title
 * @property string $photo
 * @property int $inn
 * @property string $create_at
 * @property string $modified_at
 * @property int $create_by
 * @property int $product
 * @property int $workman менеджер
 *
 * @property CompanyList $companyList
 * @property ProductList $product0
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
            [['title', 'photo', 'inn', 'create_at', 'modified_at', 'create_by', 'product', 'workman'], 'required'],
            [['inn', 'create_by', 'product', 'workman'], 'integer'],
            [['create_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 500],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => ProductList::class, 'targetAttribute' => ['product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'photo' => 'Медиа',
            'inn' => 'Инн',
            'create_at' => 'Когда создан',
            'modified_at' => 'Когда обнавлен',
            'create_by' => 'Кем создан',
            'product' => 'Продукт',
            'workman' => 'менеджер',
        ];
    }

    /**
     * Gets query for [[CompanyList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyList()
    {
        return $this->hasOne(CompanyList::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[Product0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct0()
    {
        return $this->hasOne(ProductList::class, ['id' => 'product']);
    }
}
