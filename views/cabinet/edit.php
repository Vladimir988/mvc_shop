<?php include(ROOT.'/views/layouts/header.php'); ?>

	<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 padding-right">
						
						<?php	if($result): ?>

						<p style="text-align:center;">Поздравляем данные отредактированы!<p>

						<?php else: ?>

						<div class="signup-form"><!-- sign up form  -->
							<h2>Редактирование данных</h2>
							<span><?php if(isset($errors['result'])){echo $errors['result'], "<br><br>";} ?></span>
							<form action="#" method="post">
								<label>
									<p>Имя:</p>
									<input type="text" name="name" placeholder="Имя:" value="<?php echo $name; ?>">
									<span><?php if(isset($errors['name'])){echo $errors['name'];} ?></span>
								</label>
								<label>
									<p>Пароль:</p>
									<input type="password" name="password" placeholder="Пароль:" value="<?php echo $password; ?>">
									<span><?php if(isset($errors['password'])){echo $errors['password'];} ?></span>
								</label>
								<input type="submit" name="submit" class="btn btn-default" value="Изменить!">
							</form>
						</div><!-- /sign up form  -->
						
						<?php endif; ?>

						<br>
						<br>
						
					</div>
				</div>
			</div>
		</section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>