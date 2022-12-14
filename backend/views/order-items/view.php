<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderItems */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <? Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <? Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_id',
            'product_id',
            'name',
            'price',
            'qty_item',
            'sum_item',
        ],
    ]) ?>

</div>
