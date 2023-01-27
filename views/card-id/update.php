<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CardId $model */

$this->title = 'Update Card Id: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Card Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
