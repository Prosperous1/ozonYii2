<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CategoryList $model */

$this->title = 'Create Category List';
$this->params['breadcrumbs'][] = ['label' => 'Category Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
