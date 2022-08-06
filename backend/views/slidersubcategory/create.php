<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slidersubcategory */

$this->title = 'Create Slidersubcategory';
$this->params['breadcrumbs'][] = ['label' => 'Slidersubcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slidersubcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
