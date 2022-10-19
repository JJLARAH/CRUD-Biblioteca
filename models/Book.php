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
 * @property string $cover
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
            [['title','pagecount','id_author','id_genre'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['pagecount'], 'number', 'max' => 9999],
            [['id_author'], 'number', 'max' => 11],
            [['id_genre'], 'number', 'max' => 11],
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
}
