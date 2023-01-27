<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CardList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'card_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
