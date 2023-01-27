<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewId $model */

$this->title = 'Update Review Id: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Review Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="review-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
