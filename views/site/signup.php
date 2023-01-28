<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'mail')->textInput() ?>
            <?= $form->field($model, 'phone')->textInput() ?>
            <?= $form->field($model, 'city_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name')))?>
            <?= $form->field($model, 'currency_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Currency::find()->all(), 'id', 'name')))?>
            <?= $form->field($model, 'sex_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Sex::find()->all(), 'id', 'nane')))?>
            <?= $form->field($model, 'photo_url')->textInput() ?>
            <?= $form->field($model, 'date_of_birth')->widget(\yii\jui\DatePicker::className(), [
                'options' => ['class' => 'form-control'],
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?>
            <?= $form->field($model, 'first_name')->textInput() ?>
            <?= $form->field($model, 'last_name')->textInput() ?>
            <?= $form->field($model, 'password')->passwordInput()?>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

