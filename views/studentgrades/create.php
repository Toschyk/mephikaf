<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentGrades */

$this->title = 'Create Student Grades';
$this->params['breadcrumbs'][] = ['label' => 'Student Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-grades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
