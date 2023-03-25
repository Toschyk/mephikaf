<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $role 1- Админ, 2- Зав.кафедрой, 3- Преподаватель, 4 - Студент
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password'], 'required'],
            [['role'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
        ];
    }
}
