<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Film;

/**
 * FilmSearch represents the model behind the search form of `common\models\Film`.
 */
class FilmSearch extends Film
{
    public $image;
    public static function tableName(): string
    {
        return '{{%film}}';
    }
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'duration', 'age_rating'], 'integer'],
            [['title', 'image_extension', 'description'], 'safe'],
            [['image'], 'safe']
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Film::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'duration' => $this->duration,
            'age_rating' => $this->age_rating,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image_extension', $this->image_extension])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
