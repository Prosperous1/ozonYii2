<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CardId $model */

$this->title = 'Create Card Id';
$this->params['breadcrumbs'][] = ['label' => 'Card Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-id-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
