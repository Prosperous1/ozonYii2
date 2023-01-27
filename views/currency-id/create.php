<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CurrencyId $model */

$this->title = 'Create Currency Id';
$this->params['breadcrumbs'][] = ['label' => 'Currency Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-id-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
