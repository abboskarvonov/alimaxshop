<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_uz') ?>

    <?= $form->field($model, 'name_ru') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'menu_id') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'content_uz') ?>

    <?php // echo $form->field($model, 'content_ru') ?>

    <?php // echo $form->field($model, 'content_en') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
