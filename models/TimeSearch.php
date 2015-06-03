<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Time;

/**
 * TimeSearch represents the model behind the search form about `app\models\Time`.
 */
class TimeSearch extends Time
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'total'], 'integer'],
            [['date', 'arrival', 'lunch_start', 'lunch_end', 'departure'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Time::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'arrival' => $this->arrival,
            'lunch_start' => $this->lunch_start,
            'lunch_end' => $this->lunch_end,
            'departure' => $this->departure,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}
