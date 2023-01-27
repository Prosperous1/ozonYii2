<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CategoryList $model */

$this->title = 'Update Category List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Category Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
