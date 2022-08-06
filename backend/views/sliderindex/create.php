<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sliderindex */

$this->title = 'Create Sliderindex';
$this->params['breadcrumbs'][] = ['label' => 'Sliderindices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliderindex-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
