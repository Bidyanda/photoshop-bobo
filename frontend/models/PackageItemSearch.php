<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PackageItem;

/**
 * PackageItemSearch represents the model behind the search form of `frontend\models\PackageItem`.
 */
class PackageItemSearch extends PackageItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_item_id', 'package_id', 'item_id'], 'integer'],
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
        $query = PackageItem::find();

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
            'package_item_id' => $this->package_item_id,
            'package_id' => $this->package_id,
            'item_id' => $this->item_id,
        ]);

        return $dataProvider;
    }
}
