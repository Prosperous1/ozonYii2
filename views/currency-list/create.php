<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CurrencyList $model */

$this->title = 'Create Currency List';
$this->params['breadcrumbs'][] = ['label' => 'Currency Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
