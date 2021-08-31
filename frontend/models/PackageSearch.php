<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Package;

/**
 * PackageSearch represents the model behind the search form of `frontend\models\Package`.
 */
class PackageSearch extends Package
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_id', 'category_id', 'no_of_camera_man'], 'integer'],
            [['description', 'package_name', 'image','price'], 'safe'],
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
        $query = Package::find();

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
            'package_id' => $this->package_id,
            'category_id' => $this->category_id,
            'no_of_camera_man' => $this->no_of_camera_man,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'package_name', $this->package_name])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
