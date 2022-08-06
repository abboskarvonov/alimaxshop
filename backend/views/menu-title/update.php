<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuTitle */

$this->title = 'Update Menu Title: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menu Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menu-title-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
