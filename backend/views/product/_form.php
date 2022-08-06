<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MenuElement;
use backend\models\Menu;
use backend\models\MenuTitle;
use backend\models\Shop;
use backend\models\Type;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <? 
    if ($model->photo == null ) {
        echo $form->field($model, 'photo[]')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*', 'multiple' => true],
        ]);
    }
    else {
        ?>
        <h3>Rasmlar yuklangan</h3><br>
        <?
    }
    ?>

    <? echo '<label class="control-label">'.Yii::t('app',"Меню:").'</label>'; ?>
            <?= $form->field($model, 'menu')->dropDownList(
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
    
    <? echo '<label class="control-label">'.Yii::t('app',"Титул меню:").'</label>'; ?>
            <?= $form->field($model, 'menu_title')->dropDownList(
                MenuTitle::dropdown(),
                    [
                        'label'=>'false',
                        'prompt' => Yii::t('app','Выбрать Титул меню'),
                        'id'=>'menu-title-id',
                        'class'=>'form-control',
                            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('product/menuelem?id=').'"+$(this).val(), function(data) { $("select#menu-elem-id").html(data); })'
                    ]
                )->label(false);
            ?>

    <?= $form->field($model, 'menu_id')->dropDownList(
                        ArrayHelper::map( MenuElement::find()->all(), 'id', 'name_ru'),
                        [
                            'label'=>'false',
                            'prompt' => Yii::t('app','Выбрать элемент меню'),
                            'id'=>'menu-elem-id',
                            'class'=>'form-control',
                        ]);
                        ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'sale')->dropDownList(['1' => 'Да', '2' => 'Нет'], ['prompt' => 'Выбрать скидка']) ?>

    

    <?if(Yii::$app->user->can('super-admin')){
        echo $form->field($model, 'shop_id')->dropDownList(
            ArrayHelper::map( Shop::find()->all(), 'id', 'name'),
            [
                'prompt' => 'Выберите магазин',
            ]);
    }
    else {
        echo $form->field($model, 'shop_id')->dropDownList(
            ArrayHelper::map( Shop::find()->where(['user_id'=>Yii::$app->user->identity->id])->all(), 'id', 'name'),
            [
                'prompt' => 'Выберите магазин',
            ]);
    } 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
