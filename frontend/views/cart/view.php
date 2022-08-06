<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Корзина';
?>
	<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?=Html::encode($this->title)?></h2>
                		<h1>Корзина</h1>
                	</div>
				</div>
				<?php if(Yii::$app->session->hasFlash('success')):?>
					<div class="alert alert-success alert-desmissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3><?php echo Yii::$app->session->getFlash('success'); ?></h3>
					</div>
				<?php endif;?>

				<?php if(Yii::$app->session->hasFlash('error')):?>
					<div class="alert alert-danger alert-desmissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo Yii::$app->session->getFlash('error'); ?>
					</div>
				<?php endif;?>
				<div class="container">
					<?php if (!empty($session['cart'])): ?> 
					<div>
						<table class="table table-stripped">
							<thead>
								<tr>
									<th>Фото</th>
									<th>Название</th>
									<th>Количество</th>
									<th>Цена</th>
									<th>Итоговая цена</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($session['cart'] as $id => $item): ?>
								<tr>
									<td><img style="max-width: 100px;" src="../<?=$item['img']?>"></td>
									<td><?= $item['name']?></td>
									<td><?= $item['qty']?></td>
									<td><?= $item['price']?></td>
									<td><?= $item['qty'] *  $item['price']?></td>
								</tr>
							<?php endforeach?>
								<tr>
									<td colspan="2">Общее количество и цена товаров:</td>
									<td><?= $session['cart.qty']?></td>
									<td><?= $session['cart.sum']?></td>
									<td><?= $session['cart.sum']?></td>
								</tr>
							</tbody>
						</table>		
					</div>
					<hr>
					<?php $form = ActiveForm::begin()?>
					<?= $form->field($order, 'name')?>
					<?= $form->field($order, 'phone')?>
					<?= $form->field($order, 'address')?>
					<?= Html::submitButton('Buyurtma berish', ['class' => 'btn btn-success'])?>
					<?php $form = ActiveForm::end()?>
					<?php else: ?> 
						<h3 align="center">Корзина пуста</h3>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>
