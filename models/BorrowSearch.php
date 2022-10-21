<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Borrow;

/**
 * BorrowSearch represents the model behind the search form of `app\models\Borrow`.
 */
class BorrowSearch extends Borrow
{

    public $book;
    public $user;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borrow', 'id_user', 'id_book'], 'integer'],
            [['date_borrow', 'date_return', 'book', 'user'], 'safe'],
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
        $query = Borrow::find();

        $query->joinWith(['book', 'user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5]
        ]);

        $dataProvider->sort->attributes['book'] = [
            'asc' => ['books.title' => SORT_ASC],
            'desc' => ['books.title' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['user'] = [
            'asc' => ['users.name' => SORT_ASC],
            'desc' => ['users.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_borrow' => $this->id_borrow,
            'id_user' => $this->id_user,
            'id_book' => $this->id_book,
            'date_borrow' => $this->date_borrow,
            'date_return' => $this->date_return,
        ]);

        $query->andFilterWhere(['like', 'books.title', $this->book])
            ->andFilterWhere(['like', 'users.name', $this->user])
            ->andFilterWhere(['like', 'date_borrow', $this->date_borrow])
            ->andFilterWhere(['like', 'date_return', $this->date_return]);

        return $dataProvider;
    }

     /**
     * Creates data provider instance with search query applied for a user
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchHistory($params)
    {

        $query = Borrow::find()->where(['borrows.id_user' => $_GET['id_user']]);

        $query->joinWith(['book', 'user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5]
        ]);

        $dataProvider->sort->attributes['book'] = [
            'asc' => ['books.title' => SORT_ASC],
            'desc' => ['books.title' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['user'] = [
            'asc' => ['users.name' => SORT_ASC],
            'desc' => ['users.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_borrow' => $this->id_borrow,
            'id_user' => $this->id_user,
            'id_book' => $this->id_book,
            'date_borrow' => $this->date_borrow,
            'date_return' => $this->date_return,
        ]);

        $query->andFilterWhere(['like', 'books.title', $this->book])
            ->andFilterWhere(['like', 'users.name', $this->user])
            ->andFilterWhere(['like', 'date_borrow', $this->date_borrow])
            ->andFilterWhere(['like', 'date_return', $this->date_return]);

        return $dataProvider;
    }
}
