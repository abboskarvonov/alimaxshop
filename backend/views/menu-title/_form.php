<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Menu;
/* @var $this yii\web\View */
/* @var $model backend\models\MenuTitle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-title-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_id')->dropDownList(
                        ArrayHelper::map( Menu::find()->all(), 'id', 'name_ru'),
                        [
                            'prompt' => 'Menuni tanlang',
                        ]);
                        ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
