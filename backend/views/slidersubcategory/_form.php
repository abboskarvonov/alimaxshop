<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Menu;
use backend\models\MenuTitle;
/* @var $this yii\web\View */
/* @var $model backend\models\Slidersubcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slidersubcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>

    <? echo '<label class="control-label">'.Yii::t('app',"Выбрать меню:").'</label>'; ?>
            <?= $form->field($model, 'menu_id')->dropDownList(
                Menu::dropdown(),
                    [
                        'label'=>'false',
                        'prompt' => Yii::t('app','Выбрать меню'),
                        'id'=>'menu-id',
                        'class'=>'form-control',
                                            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('product/menutitle?id=').'"+$(this).val(), function(data) { $("select#menu-title-id").html(data); })'

                    ]
                )->label(false);
        ?>
    
    <? echo '<label class="control-label">'.Yii::t('app',"Выбрать титул меню:").'</label>'; ?>
            <?= $form->field($model, 'menu_title_id')->dropDownList(
                MenuTitle::dropdown(),
                    [
                        'label'=>'false',
                        'prompt' => Yii::t('app','Выбрать титул меню'),
                        'id'=>'menu-title-id',
                        'class'=>'form-control',
                    ]
                )->label(false);
            ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
