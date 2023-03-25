<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentGrades;

/**
 * StudentGradesSearch represents the model behind the search form of `app\models\StudentGrades`.
 */
class StudentGradesSearch extends StudentGrades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'StudentId', 'SubjectId', 'Grade'], 'integer'],
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
        $query = StudentGrades::find();

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
            'Id' => $this->Id,
            'StudentId' => $this->StudentId,
            'SubjectId' => $this->SubjectId,
            'Grade' => $this->Grade,
        ]);

        return $dataProvider;
    }
}
