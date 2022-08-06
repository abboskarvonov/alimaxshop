<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Menu;
use backend\models\MenuTitle;
use backend\models\MenuElement;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?
    if(empty($model->img)){
        echo $form->field($model, 'img')->fileInput(['maxlength' => true]);
    }
    else {
        ?>
        <img src="<?=$model->img?>" alt="" width="100%">
        <?
    }
    ?>

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
                            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('product/menuelem?id=').'"+$(this).val(), function(data) { $("select#menu-elem-id").html(data); })'
                    ]
                )->label(false);
            ?>

    <?= $form->field($model, 'menu_element_id')->dropDownList(
                        ArrayHelper::map( MenuElement::find()->all(), 'id', 'name_ru'),
                        [
                            'label'=>'false',
                            'prompt' => Yii::t('app','Выбрать элемент меню'),
                            'id'=>'menu-elem-id',
                            'class'=>'form-control',
                        ]);
                        ?>
    <?= $form->field($model, 'class')->textInput([]);?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
