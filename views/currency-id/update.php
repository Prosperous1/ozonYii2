<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CurrencyId $model */

$this->title = 'Update Currency Id: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Currency Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="currency-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
