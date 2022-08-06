<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sliderindex */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sliderindex-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
