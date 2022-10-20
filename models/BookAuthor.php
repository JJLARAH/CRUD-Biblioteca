<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_author".
 *
 * @property int $id_author
 * @property string|null $name
 * @property string|null $surname
 *
 * @property Books[] $books
 */
class BookAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_author' => 'Id Author',
            'name' => 'Name',
            'surname' => 'Surname',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id_author' => 'id_author']);
    }
}
