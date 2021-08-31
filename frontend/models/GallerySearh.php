<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Gallery;

/**
 * GallerySearh represents the model behind the search form of `frontend\models\Gallery`.
 */
class GallerySearh extends Gallery
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gallery_id', 'category_id'], 'integer'],
            [['image', 'description'], 'safe'],
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
        $query = Gallery::find();

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
            'gallery_id' => $this->gallery_id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
