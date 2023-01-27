<?php

use app\models\ReviewId;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReviewIdSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Review Ids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-id-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Review Id', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'advantage',
            'disadvantage',
            'description',
            'photo',
            //'video',
            //'rating',
            //'create_at',
            //'modified_at',
            //'create_by',
            //'like',
            //'dislike',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ReviewId $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
