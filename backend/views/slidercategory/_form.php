<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Menu;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Slidercategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slidercategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_id')->dropDownList(
                        ArrayHelper::map(Menu::find()->all(), 'id', 'name_ru'),
                        [
                            'prompt' => 'Выберите меню',
                        ]);
                        ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
