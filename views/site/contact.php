<?php include(ROOT.'/views/layouts/header.php'); ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 padding-right">

					<?php	if($result === true): ?>
						<p style="text-align:center;">Сообщение отправленно, мы ответим вам на указанный email!<p>
					<?php else: ?>
					
					<div class="signup-form"><!-- sign up form  -->
						<h2>Обратная связь</h2>
						<h5>Есть вопросы? Напишите нам!</h5>
						<br>
						<form action="#" method="post">
							<label>
								<p>Ваша почта</p>
								<input type="email" name="userEmail" placeholder="E-mail:" value="<?php echo $userEmail; ?>">
								<span><?php if(isset($errors['userEmail'])){echo $errors['userEmail'];} ?></span>
							</label>
							<label>
								<p>Сообщение</p>
								<textarea name="userText" type="text" placeholder="Сообщение:" cols="30" rows="5" value="<?php echo $userText; ?>"></textarea>
							</label>
							<input type="submit" name="submit" class="btn btn-default" value="Отправить" style="margin-top:15px;">
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