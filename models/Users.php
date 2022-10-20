<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $name
 * @property string $surname
 * @property string|null $gender
 * @property int $phonenum
 * @property string $location
 * @property string|null $photo
 *
 * @property Borrow[] $borrow
 */
class Users extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'phonenum', 'location'], 'required'],
            [['phonenum'], 'integer','max'=>999999999999999],
            [['name', 'surname'], 'string', 'max' => 45],
            [['gender'], 'string', 'max' => 20],
            [['location'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'jpg,jpeg,png,webp']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'image' => 'Photo',
            'name' => 'Name',
            'surname' => 'Surname',
            'gender' => 'Gender',
            'phonenum' => 'Phone number',
            'location' => 'Location',
        ];
    }

    /**
     * Gets query for [[Borrows]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrows()
    {
        return $this->hasMany(Borrow::class, ['id_user' => 'id_user']);
    }
}
