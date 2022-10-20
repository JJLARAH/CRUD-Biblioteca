<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{

    public $author;
    public $genre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_book', 'pagecount', 'id_author', 'id_genre'], 'integer'],
            [['title', 'cover', 'author', 'genre'], 'safe'],
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
        $query = Book::find();

        $query->joinWith(['author', 'genre']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5]
        ]);

        $dataProvider->sort->attributes['author'] = [
            'asc' => ['book_author.name' => SORT_ASC],
            'desc' => ['book_author.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['genre'] = [
            'asc' => ['book_genre.genre' => SORT_ASC],
            'desc' => ['book_genre.genre' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_book' => $this->id_book,
            'pagecount' => $this->pagecount,
            'id_author' => $this->id_author,
            'id_genre' => $this->id_genre,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'pagecount', $this->pagecount])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'book_author.name', $this->author])
            ->andFilterWhere(['like', 'book_genre.genre', $this->genre]);

        return $dataProvider;
    }
}
