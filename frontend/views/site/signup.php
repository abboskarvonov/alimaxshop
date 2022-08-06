<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', "Ro'yxatdan o'tish");
?>
<div class="container" style="padding-top: 10px;">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => false]) ?>

                <?= $form->field($model, 'last_name')->textInput(['autofocus' => false]) ?>

                <?= $form->field($model, 'phone') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', "Ro'yxatdan o'tish"), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
