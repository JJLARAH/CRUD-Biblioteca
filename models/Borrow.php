<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "borrows".
 *
 * @property int $id_borrow
 * @property int $id_user
 * @property int $id_book
 * @property string $date_borrow
 * @property string|null $date_return
 *
 * @property Book $book
 * @property Users $user
 */
class Borrow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrows';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_book'], 'required'],
            [['id_user', 'id_book'], 'integer'],
            [['date_borrow', 'date_return'], 'safe'],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['id_book' => 'id_book']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_borrow' => 'Id Borrow',
            'users.name' => 'User',
            'books.title' => 'Book',
            'date_borrow' => 'Borrow Date',
            'date_return' => 'Return Date',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id_book' => 'id_book']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id_user' => 'id_user']);
    }
}
