<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Professors".
 *
 * @property int $Id
 * @property string $Name
 * @property int $DepartmentId
 *
 * @property Departments $department
 * @property Subjects[] $subjects
 */
class Professors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Professors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'DepartmentId'], 'required'],
            [['DepartmentId'], 'integer'],
            [['Name'], 'string', 'max' => 255],
            [['DepartmentId'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['DepartmentId' => 'Id']],
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
            'DepartmentId' => 'Department ID',
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['Id' => 'DepartmentId']);
    }

    /**
     * Gets query for [[Subjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['ProfessorId' => 'Id']);
    }
}
