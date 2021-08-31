<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Item;

/**
 * ItemSearch represents the model behind the search form of `frontend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id'], 'integer'],
            [['item_name', 'item_brand', 'lens_type', 'item_image', 'model_no', 'description'], 'safe'],
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
        $query = Item::find();

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
            'item_id' => $this->item_id,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'item_brand', $this->item_brand])
            ->andFilterWhere(['like', 'lens_type', $this->lens_type])
            ->andFilterWhere(['like', 'item_image', $this->item_image])
            ->andFilterWhere(['like', 'model_no', $this->model_no])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
