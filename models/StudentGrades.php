<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "StudentGrades".
 *
 * @property int $Id
 * @property int $StudentId
 * @property int $SubjectId
 * @property int $Grade
 *
 * @property Students $student
 * @property Subjects $subject
 */
class StudentGrades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'StudentGrades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['StudentId', 'SubjectId', 'Grade'], 'required'],
            [['StudentId', 'SubjectId', 'Grade'], 'integer'],
            [['StudentId'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['StudentId' => 'Id']],
            [['SubjectId'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['SubjectId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'StudentId' => 'Student ID',
            'SubjectId' => 'Subject ID',
            'Grade' => 'Grade',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['Id' => 'StudentId']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['Id' => 'SubjectId']);
    }
}
