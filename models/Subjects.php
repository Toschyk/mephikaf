<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Subjects".
 *
 * @property int $Id
 * @property string $Name
 * @property int $ProfessorId
 *
 * @property Performance[] $performances
 * @property StudentGrades[] $studentGrades
 * @property Professors $professor
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'ProfessorId'], 'required'],
            [['ProfessorId'], 'integer'],
            [['Name'], 'string', 'max' => 255],
            [['ProfessorId'], 'exist', 'skipOnError' => true, 'targetClass' => Professors::className(), 'targetAttribute' => ['ProfessorId' => 'Id']],
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
            'ProfessorId' => 'Professor ID',
        ];
    }

    /**
     * Gets query for [[Performances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerformances()
    {
        return $this->hasMany(Performance::className(), ['SubjectId' => 'Id']);
    }

    /**
     * Gets query for [[StudentGrades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGrades()
    {
        return $this->hasMany(StudentGrades::className(), ['SubjectId' => 'Id']);
    }

    /**
     * Gets query for [[Professor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professors::className(), ['Id' => 'ProfessorId']);
    }
}
