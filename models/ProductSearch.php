<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'company', 'flag', 'discount', 'rating', 'review'], 'integer'],
            [['name', 'media', 'description', 'create_at', 'modified_at', 'delete_at', 'characteristic'], 'safe'],
            [['old_price', 'new_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'company' => $this->company,
            'create_at' => $this->create_at,
            'modified_at' => $this->modified_at,
            'delete_at' => $this->delete_at,
            'flag' => $this->flag,
            'old_price' => $this->old_price,
            'discount' => $this->discount,
            'new_price' => $this->new_price,
            'rating' => $this->rating,
            'review' => $this->review,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'media', $this->media])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'characteristic', $this->characteristic]);

        return $dataProvider;
    }
}
