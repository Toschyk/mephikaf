<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerformanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Performances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="performance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Performance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'StudentId',
            'SubjectId',
            'Grade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
