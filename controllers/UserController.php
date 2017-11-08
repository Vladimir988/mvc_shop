<?php

class UserController {
	public function actionRegister() {

		$name = '';
		$email = '';
		$password = '';

		if(isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			if(User::checkName($name)) {
				echo "<br>$name: ок!";
			} else {
				$errors['1'] = 'Имя не должно быть короче 5-ти символов';
			}

			if(User::checkEmail($email)) {
				echo "<br>$email: ок!";
			} else {
				$errors['2'] = 'Неправильный email';
			}

			if(User::checkPassword($password)) {
				echo "<br>$password: ок!";
			} else {
				$errors['3'] = 'Пароль не должно быть короче 6-ти символов';
			}
		}

		require_once(ROOT . '/views/user/register.php');
		return true;
	}
}