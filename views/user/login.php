<?php include(ROOT.'/views/layouts/header.php'); ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 padding-right">
					
					<?php	if(isset($result)): ?>
						<p style="text-align:center;">Поздравляем с успешной регистрацией!<p>
					<?php else: ?>

					<div class="signup-form"><!-- sign up form  -->
						<h2>Регистрация на сайте</h2>
						<form action="#" method="post">
							<label>
								<input type="email" name="email" placeholder="E-mail:" value="<?php echo $email; ?>">
								<span>
									<?php if(isset($errors['email'])){echo $errors['email'];} ?>
									<?php if(isset($errors['emailExists'])){echo $errors['emailExists'];} ?>
								</span>
							</label>
							<label>
								<input type="password" name="password" placeholder="Пароль:" value="<?php echo $password; ?>">
								<span><?php if(isset($errors['password'])){echo $errors['password'];} ?></span>
							</label>
							<input type="submit" name="submit" class="btn btn-default" value="Регистрация">
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