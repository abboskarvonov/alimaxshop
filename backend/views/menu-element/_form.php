<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MenuTitle;
use backend\models\Menu;
/* @var $this yii\web\View */
/* @var $model backend\models\MenuElement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-element-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <? echo '<label class="control-label">'.Yii::t('app',"Выбрать меню:").'</label>'; ?>
            <?= $form->field($model, 'menu_id')->dropDownList(
                Menu::dropdown(),
                    [
                        'label'=>'false',
                        'prompt' => Yii::t('app','Выбрать меню'),
                        'id'=>'menu-id',
                        'class'=>'form-control',
                                            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('menu-element/menutitle?id=').'"+$(this).val(), function(data) { $("select#menu-title-id").html(data); })'

                    ]
                )->label(false);
        ?>
    
    <? echo '<label class="control-label">'.Yii::t('app',"Выбрать элемент меню:").'</label>'; ?>
            <?= $form->field($model, 'menu_title_id')->dropDownList(
                MenuTitle::dropdown(),
                    [
                        'label'=>'false',
                        'prompt' => Yii::t('app','Выбрать элемент меню'),
                        'id'=>'menu-title-id',
                        'class'=>'form-control',
                    ]
                )->label(false);
            ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
