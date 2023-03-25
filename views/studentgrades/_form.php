<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentGrades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-grades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'StudentId')->textInput() ?>

    <?= $form->field($model, 'SubjectId')->textInput() ?>

    <?= $form->field($model, 'Grade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
