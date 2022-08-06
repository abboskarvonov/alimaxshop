<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\Shop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->dropDownList(
                        ArrayHelper::map(User::find()->where(['id' => Yii::$app->user->identity->id])->all(), 'id', 'username'),
                        [
                            'prompt' => 'Выберите пользователя',
                        ]);
                        ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
