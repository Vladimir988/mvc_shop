<?php include(ROOT.'/views/layouts/admin/header-admin.php'); ?>

<section>
	<div class="container">
		<div class="row">

			<br/>

			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li><a href="/admin/product">Управление товарами</a></li>
					<li class="active">Редактировать товар</li>
				</ol>
			</div>


			<div class="col-lg-12"><h4>Добавить новый товар</h4></div>

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

						<p>Название товара</p>
						<input type="text" name="name" placeholder="" value="<?php if(isset($options)){echo $options['name'];} ?>">

						<p>Код товара</p>
						<input type="text" name="code" placeholder="" value="<?php if(isset($options)){echo $options['code'];} ?>">

						<p>Стоимость, $</p>
						<input type="text" name="price" placeholder="" value="<?php if(isset($options)){echo $options['price'];} ?>">

						<p>Категория</p>
						<select name="category_id">
							<?php if (is_array($categoriesList)): ?>
								<?php foreach ($categoriesList as $category): ?>
									<option value="<?php echo $category['id']; ?>">
										<?php echo $category['name']; ?>
									</option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>

						<br/><br/>

						<p>Производитель</p>
						<input type="text" name="brand" placeholder="" value="<?php if(isset($options)){echo $options['brand'];} ?>">

						<p>Изображение товара</p>
						<input type="file" name="image" placeholder="" value="">

						<p>Наличие на складе</p>
						<select name="availability">
							<option value="1" selected="selected">Да</option>
							<option value="0">Нет</option>
						</select>

						<br/><br/>

						<p>Количество товара доступного на складе</p>
						<input type="text" name="quantity" placeholder="" value="<?php if(isset($options)){echo $options['quantity'];} ?>">

						<p>Новинка</p>
						<select name="is_new">
							<option value="1" selected="selected">Да</option>
							<option value="0">Нет</option>
						</select>

						<br/><br/>

						<p>Рекомендуемые</p>
						<select name="is_recommended">
							<option value="1" selected="selected">Да</option>
							<option value="0">Нет</option>
						</select>

						<br/><br/>

						<p>Статус</p>
						<select name="status">
							<option value="1" selected="selected">Отображается</option>
							<option value="0">Скрыт</option>
						</select>

						<br/><br/>

						<p>Детальное описание</p>
						<textarea name="description"><?php if(isset($options)){echo $options['description'];} ?></textarea>

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