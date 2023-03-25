<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Departments".
 *
 * @property int $Id
 * @property string $Name
 *
 * @property Groups[] $groups
 * @property Professors[] $professors
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['DepartmentId' => 'Id']);
    }

    /**
     * Gets query for [[Professors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfessors()
    {
        return $this->hasMany(Professors::className(), ['DepartmentId' => 'Id']);
    }
}
