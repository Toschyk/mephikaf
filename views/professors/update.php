<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Professors */

$this->title = 'Update Professors: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="professors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
