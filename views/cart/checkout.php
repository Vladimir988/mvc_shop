<?php include(ROOT.'/views/layouts/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<?php include(ROOT.'/views/layouts/sidebar.php'); ?>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Корзина</h2>

					<?php if($result): ?>
						<div class="col-sm-8 col-sm-offset-2"><p>Заказ оформлен успешно. Спасибо, в ближайшее время наши сотрудники свяжутся с вами для подтверждения заказа.</p></div>
					<?php else: ?>
						<div class="col-sm-8 col-sm-offset-2"><p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>грн.</p></div>
						<div class="col-sm-8 col-sm-offset-2">

							<!-- <?php if(isset($errors) and is_array($errors)): ?>
								<ul>
									<?php foreach($errors as $error): ?>
										<li> - <?php echo $error; ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?> -->

							<p>Для оформления заказа заполните форму. Наш менеджер свяжется с вами.</p>

							<div class="login-form">
								<form action="#" method="post">
								<label>
									<p>Имя:</p>
									<input type="text" name="userName" placeholder="Имя:" value="<?php echo $userName; ?>">
									<span><?php if(isset($errors['userName'])){echo $errors['userName'];} ?></span>
								</label>
								<label>
									<p>Номер телефона:</p>
									<input type="text" name="userPhone" placeholder="Телефон:" value="<?php echo $userPhone; ?>">
									<span><?php if(isset($errors['userPhone'])){echo $errors['userPhone'];} ?></span>
								</label>
								<label>
									<p>Комментарий к заказу:</p>
									<textarea name="userComment" placeholder="Ваш комментарий:" id="" cols="30" rows="10"><?php echo $userComment; ?></textarea>
								</label>
								<br>
								<br>
								<input type="submit" name="submit" class="btn btn-default" value="Оформить!">
							</form>
							</div>
						</div>

					<?php endif; ?>

				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>