<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Это страница «О нас». Вы можете изменить следующий файл, чтобы настроить его содержимое:
    </p>

    <code><?= __FILE__ ?></code>
</div>
