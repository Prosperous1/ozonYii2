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
 * @property int $workman менеджер
 *
 * @property CompanyList $companyList
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
            [['title', 'photo', 'inn', 'create_at', 'modified_at', 'create_by', 'workman'], 'required'],
            [['inn', 'create_by', 'workman'], 'integer'],
            [['create_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 500],
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
            'photo' => 'Photo',
            'inn' => 'Inn',
            'create_at' => 'Create At',
            'modified_at' => 'Modified At',
            'create_by' => 'Create By',
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
}
