<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CategoryId $model */

$this->title = 'Create Category Id';
$this->params['breadcrumbs'][] = ['label' => 'Category Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-id-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
