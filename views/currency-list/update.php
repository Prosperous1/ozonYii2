<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CurrencyList $model */

$this->title = 'Update Currency List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Currency Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="currency-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>