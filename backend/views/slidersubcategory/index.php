<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slidersubcategories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slidersubcategory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Slidersubcategory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'img',
            'menu_id',
            'menu_title_id',
            'class',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
