<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id_book
 * @property string $title
 * @property int $pagecount
 * @property int $id_author
 * @property int $id_genre
 * @property string|null $cover
 *
 * @property BookAuthor $author
 * @property Borrows[] $borrows
 * @property BookGenre $genre
 */
class Book extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'pagecount', 'id_author', 'id_genre'], 'required'],
            [['pagecount', 'id_author', 'id_genre'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['pagecount'], 'number', 'max' => 9999],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => BookAuthor::class, 'targetAttribute' => ['id_author' => 'id_author']],
            [['id_genre'], 'exist', 'skipOnError' => true, 'targetClass' => BookGenre::class, 'targetAttribute' => ['id_genre' => 'id_genre']],
            [['image'], 'file', 'extensions' => 'jpg,jpeg,png,webp']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_book' => 'Book Id',
            'title' => 'Title',
            'pagecount' => 'Pages',
            'id_author' => 'Author',
            'id_genre' => 'Genre',
            'image' => 'Cover',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(BookAuthor::class, ['id_author' => 'id_author']);
    }

    /**
     * Gets query for [[Borrows]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrows()
    {
        return $this->hasMany(Borrows::class, ['id_book' => 'id_book']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(BookGenre::class, ['id_genre' => 'id_genre']);
    }
}
