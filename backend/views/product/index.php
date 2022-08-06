<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    img {
        margin-bottom: 5px;
    }
</style>
<div class="container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <?
        foreach ($model as $model) {
        ?>
        <div class="col-sm-2 col-xs-6" style="margin-bottom: 10px;">
            <a href="<?=\yii\helpers\Url::to(["product/view", 'id' => $model->id])?>"><img src="<?=$model->photo?>" alt="" class="img-thumbnail"></a>
            <a href="<?=\yii\helpers\Url::to(["product/view", 'id' => $model->id])?>" class="btn btn-primary btn-block btn-lg"><i style="font-size: 20px" class="fa fa-pencil"></i></a>
               
        </div>
        <?
        }
        ?>
    </div>
    


</div>
