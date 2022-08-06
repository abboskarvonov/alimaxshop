<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuElement */

$this->title = 'Create Menu Element';
$this->params['breadcrumbs'][] = ['label' => 'Menu Elements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-element-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
