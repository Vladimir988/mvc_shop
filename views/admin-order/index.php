<?php include(ROOT.'/views/layouts/admin/header-admin.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<br>

			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li class="active">Управление заказами</li>
				</ol>
			</div>

			<h4>Список заказов</h4>

			<table class="table-bordered table-striped table">
				<tr>
					<td>ID заказа</td>
					<td>Имя покупателя</td>
					<td>Телефон покупателя</td>
					<td>Дата оформления</td>
					<td>Статус</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php foreach($orderList as $order): ?>
					<tr>
						<td><?php echo $order['id']; ?></td>
						<td><?php echo $order['user_name']; ?></td>
						<td><?php echo $order['user_phone']; ?></td>
						<td><?php echo $order['date']; ?></td>
						<td><?php echo Order::getStatusText($order['status']); ?></td>
						<td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Просмотр"><i class="fa fa-eye"></i></a></td>
						<td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square"></i></a></td>
						<td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</section>

<?php include(ROOT.'/views/layouts/admin/footer-admin.php'); ?>