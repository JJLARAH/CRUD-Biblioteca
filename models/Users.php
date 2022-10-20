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
 *
 * @property Borrows[] $borrows
 */
class Users extends \yii\db\ActiveRecord
{
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
            [['phonenum'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 45],
            [['gender'], 'string', 'max' => 20],
            [['location'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
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
        return $this->hasMany(Borrows::class, ['id_user' => 'id_user']);
    }
}
