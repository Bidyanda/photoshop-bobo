<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `frontend\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'customer_id', 'package_id', 'created_date'], 'integer'],
            [['order_date'], 'safe'],
            [['price'], 'number'],
            [['order_status'], 'boolean'],
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
        $query = Orders::find();

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
            'order_id' => $this->order_id,
            'customer_id' => $this->customer_id,
            'order_date' => $this->order_date,
            'price' => $this->price,
            'package_id' => $this->package_id,
            'created_date' => $this->created_date,
            'order_status' => $this->order_status,
        ]);

        return $dataProvider;
    }
}
