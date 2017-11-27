<?php include(ROOT.'/views/layouts/admin/header-admin.php'); ?>

<section>
	<div class="container">
		<div class="row">

			<br/>

			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li><a href="/admin/category">Управление категориями</a></li>
					<li class="active">Редактировать категорию</li>
				</ol>
			</div>


			<div class="col-lg-12"><h4>Добавить новыю категорию</h4></div>

			<br/>

			<?php if (isset($errors) && is_array($errors)): ?>
				<ul>
					<?php foreach ($errors as $error): ?>
						<li> - <?php echo $error; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<div class="col-lg-6">
				<div class="login-form user_info">
					<form action="#" method="post" enctype="multipart/form-data">

						<p>Название категории</p>
						<input type="text" name="name" placeholder="" value="<?php if(isset($name)){echo $name;} ?>">

						<p>Порядковый номер</p>
						<input type="text" name="sort_order" placeholder="" value="<?php if(isset($sortOrder)){echo $sortOrder;} ?>">

						<p>Статус</p>
						<select name="status">
							<option value="1" selected="selected">Отображается</option>
							<option value="0">Скрыт</option>
						</select>

						<br/><br/>

						<input type="submit" name="submit" class="btn btn-default" value="Сохранить">

						<br/><br/>

					</form>
				</div>
			</div>

		</div>
	</div>
</section>

<?php include(ROOT.'/views/layouts/admin/footer-admin.php'); ?>