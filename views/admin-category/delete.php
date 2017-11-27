<?php include(ROOT.'/views/layouts/admin/header-admin.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<br>

			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li><a href="/admin/category">Управление категориями</a></li>
					<li class="active">Удалить категорию</li>
				</ol>
			</div>

			<h4>Удалить категорию #<?php echo $category_id; ?></h4>

			<p>Вы действительно хотите удалить эту категорию?</p>

			<form action="#" method="POST">
				<input type="submit" name="submit" value="Удалить">
			</form>

		</div>
	</div>
</section>

<?php include(ROOT.'/views/layouts/admin/footer-admin.php'); ?>