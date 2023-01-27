<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_id".
 *
 * @property int $id
 * @property string $name
 *
 * @property CategoryList $categoryList
 */
class CategoryId extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_id';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[CategoryList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryList()
    {
        return $this->hasOne(CategoryList::class, ['id' => 'id']);
    }
}
