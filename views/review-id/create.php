<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewId $model */

$this->title = 'Create Review Id';
$this->params['breadcrumbs'][] = ['label' => 'Review Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-id-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
