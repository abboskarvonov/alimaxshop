<?php if (!empty($session['cart'])): ?> 
<div class="table-responsive">
	<table class="table table-stripped table-hover">
		<thead>
			<tr>
				<th>Фото</th>
				<th>Названиe</th>
				<th>Количество</th>
				<th>Цена</th>
				<th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($session['cart'] as $id => $item): ?>
			<tr>
				<td><img style="max-width: 100px;" src="<?= $item['img']?>"></td>
				<td><?= $item['name']?></td>
				<td><?= $item['qty']?></td>
				<td><?= $item['price']?></td>
				<td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
			</tr>
		<?php endforeach?>
			<tr>
				<td colspan="2">Общее количество и цена товаров:</td>
				<td><?= $session['cart.qty']?></td>
				<td><?= $session['cart.sum']?></td>
			</tr>
		</tbody>
	</table>		
</div>
<?php else: ?> 
	<h3 align="center">Корзина пуста</h3>
<?php endif;?>