<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="d-flex flex-row gap-5">
        <div class="d-flex flex-column">
            <h2>Списки</h2>
            <a href="?r=category-id/index">Категории товара</a>
            <a href="?r=product-list/index">Продукты</a>
            <a href="?r=currency-id/index">Валюты</a>
            <a href="?r=card-id/index">Банковские карты</a>
            <a href="?r=company-list/index">Компании</a>
            <a href="?r=review-list/index">Отзывы</a>
        </div>
        <div class="d-flex flex-column">
            <h2>Составные сущности</h2>
            <a href="?r=product/index">Продукт</a>
            <a href="?r=company/index">Компания</a>
        </div>
    </div>
</div>