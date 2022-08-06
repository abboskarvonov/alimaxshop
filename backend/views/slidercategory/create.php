<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slidercategory */

$this->title = 'Create Slidercategory';
$this->params['breadcrumbs'][] = ['label' => 'Slidercategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slidercategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
