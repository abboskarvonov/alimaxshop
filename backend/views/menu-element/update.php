<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuElement */

$this->title = 'Update Menu Element: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menu Elements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menu-element-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
