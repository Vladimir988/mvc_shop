<?php include(ROOT.'/views/layouts/header.php'); ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 padding-right">
					
					<div class="signup-form"><!-- sign up form  -->
						<h2>Вход на сайт</h2>
						<form action="#" method="post">
							<label>
								<input type="email" name="email" placeholder="E-mail:" value="<?php echo $email; ?>">
							</label>
							<label>
								<input type="password" name="password" placeholder="Пароль:" value="<?php echo $password; ?>">
							</label>
							<span style="margin-bottom:10px;display: block;"><?php if(isset($errors['login_error'])){echo $errors['login_error'];} ?></span>
							<input type="submit" name="submit" class="btn btn-default" value="Авторизация">
						</form>
					</div><!-- /sign up form  -->

					<br>
					<br>
					
				</div>
			</div>
		</div>
	</section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>