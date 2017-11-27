<?php include(ROOT.'/views/layouts/admin/header-admin.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<br>

			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li class="active">Управление товарами</li>
				</ol>
			</div>

			<a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i>Добавить товар</a>

			<h4>Список товаров</h4>

			<table class="table-bordered table-striped table">
				<tr>
					<td>ID товара</td>
					<td>Код товара</td>
					<td>Название товара</td>
					<td>Цена</td>
					<td></td>
					<td></td>
				</tr>
				<?php foreach($productsList as $product): ?>
					<tr>
						<td><?php echo $product['id']; ?></td>
						<td><?php echo $product['code']; ?></td>
						<td><?php echo $product['name']; ?></td>
						<td><?php echo $product['price']; ?></td>
						<td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square"></i>Редактировать</a></td>
						<td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i>Удалить</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</section>

<?php include(ROOT.'/views/layouts/admin/footer-admin.php'); ?>