<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">
    <?
    if(Yii::$app->user->identity->id == 1){?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>

        <?= $form->field($model, 'qty')->textInput() ?>

        <?= $form->field($model, 'sum')->textInput() ?>

        <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => 'Статус']) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end();
    }
    else{?>
        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => 'Статус']) ?>


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end();
    }
    ?>
    

</div>
