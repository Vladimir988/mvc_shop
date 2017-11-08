<?php include(ROOT.'/views/layouts/header.php'); ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 padding-right">

					<?php if(isset($errors) and is_array($errors)): ?>

					<div class="signup-form"><!-- sign up form  -->
						<h2>Регистрация на сайте</h2>
						<form action="#" method="post">
							<label>
								<input type="text" name="name" placeholder="Имя:" value="<?php echo $name; ?>">
								<span><?php if($errors['1'] == NULL) {echo $errors['1'];} ?></span>
								<?php var_dump($errors['1']); ?>
							</label>
							<label>
								<input type="email" name="email" placeholder="E-mail:" value="<?php echo $email; ?>">
								<span><?php if($errors['2']) echo $errors['2']; ?></span>
							</label>
							<label>
								<input type="password" name="password" placeholder="Пароль:" value="<?php echo $password; ?>">
								<span><?php  if($errors['3'])echo $errors['3']; ?></span>
							</label>
							<input type="submit" name="submit" class="btn btn-default" value="Регистрация">
						</form>
					</div><!-- /sign up form  -->
					<?php else: ?>
					
					<div class="signup-form"><!-- sign up form  -->
						<h2>Регистрация на сайте</h2>
						<form action="#" method="post">
							<input type="text" name="name" placeholder="Имя:" value="<?php echo $name; ?>">
							<input type="email" name="email" placeholder="E-mail:" value="<?php echo $email; ?>">
							<input type="password" name="password" placeholder="Пароль:" value="<?php echo $password; ?>">
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