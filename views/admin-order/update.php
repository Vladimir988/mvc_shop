<?php include(ROOT.'/views/layouts/admin/header-admin.php'); ?>

<section>
	<div class="container">
		<div class="row">

			<br/>

			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li><a href="/admin/order">Управление заказами</a></li>
					<li class="active">Редактировать заказ</li>
				</ol>
			</div>


			<div class="col-lg-12"><h4>Редактировать заказ #<?php echo $id; ?></h4></div>

			<br/>

			<div class="col-lg-6">
				<div class="login-form user_info">
					<form action="#" method="post" enctype="multipart/form-data">

						<p>Имя покупателя</p>
						<input type="text" name="user_name" placeholder="" value="<?php echo $order['user_name']; ?>">

						<p>Телефон покупателя</p>
						<input type="text" name="user_phone" placeholder="" value="<?php echo $order['user_phone']; ?>">

						<p>Статус</p>
						<select name="status">
							<option value="0" <?php if($order['status'] == 0) echo ' selected="selected"' ?>>Новый заказ</option>
							<option value="1" <?php if($order['status'] == 1) echo ' selected="selected"' ?>>В обработке</option>
							<option value="2" <?php if($order['status'] == 2) echo ' selected="selected"' ?>>Доставляется</option>
							<option value="3" <?php if($order['status'] == 3) echo ' selected="selected"' ?>>Закрыт</option>
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