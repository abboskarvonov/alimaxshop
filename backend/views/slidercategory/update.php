<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slidercategory */

$this->title = 'Update Slidercategory: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Slidercategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slidercategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
