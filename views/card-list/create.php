<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CardList $model */

$this->title = 'Create Card List';
$this->params['breadcrumbs'][] = ['label' => 'Card Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
