<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card_id".
 *
 * @property int $id
 * @property int $number
 * @property string $name
 * @property string $end_date
 *
 * @property CardList $id0
 */
class CardId extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card_id';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'name', 'end_date'], 'required'],
            [['number'], 'integer'],
            [['end_date'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => CardList::class, 'targetAttribute' => ['id' => 'id']],
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
            'name' => 'Имя',
            'end_date' => 'Дата окончания',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(CardList::class, ['id' => 'id']);
    }
}
