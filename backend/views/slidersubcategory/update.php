<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slidersubcategory */

$this->title = 'Update Slidersubcategory: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Slidersubcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slidersubcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
