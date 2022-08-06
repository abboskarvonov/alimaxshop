<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuTitle */

$this->title = 'Create Menu Title';
$this->params['breadcrumbs'][] = ['label' => 'Menu Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
