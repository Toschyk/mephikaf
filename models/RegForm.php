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
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password', 'passwordConfirm', 'agree'], 'required', 'message' => 'Поле обязательно для заполнения'],
            ['fio', 'match', 'pattern' => '/^[А-Яа-я\s\-]{5,}$/u','message' => 'Только кириллица, пробелы и дефисы'],
            ['login', 'match', 'pattern' => '/^[a-zA-Z0-9\s\-]{1,}$/u','message' => 'Только латинские буквы'],
            ['login', 'unique', 'message' => 'Такой логин уже используется'],
            ['email', 'email', 'message' => 'Некорректный email'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться'],
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
            'fio' => 'ФИО',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Пароль',
            'role' => 'Role',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Даю согласие на обработку данных',
        ];
    }
}
