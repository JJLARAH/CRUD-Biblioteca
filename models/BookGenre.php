<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_genre".
 *
 * @property int $id_genre
 * @property string $genre
 *
 * @property Books[] $books
 */
class BookGenre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre'], 'required'],
            [['genre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_genre' => 'Id Genre',
            'genre' => 'Genre',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id_genre' => 'id_genre']);
    }
}
