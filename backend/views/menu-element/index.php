<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuElementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Elements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-element-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Menu Element', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_uz',
            'name_ru',
            // 'name_en',
            // 'link',
            //'menu_title_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
