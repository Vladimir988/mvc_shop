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

			if(!User::checkName($name)) {
				$errors['name'] = 'Имя не должно быть короче 5-ти символов';
			}

			if(!User::checkEmail($email)) {
				$errors['email'] = 'Неправильный email';
			}

			if(!User::checkPassword($password)) {
				$errors['password'] = 'Пароль не должно быть короче 6-ти символов';
			}

			if(User::checkEmailExists($email)) {
				$errors['emailExists'] = 'Такой email уже зарегистрирован!';
			}

			if($errors == false) {
				// SAVE USER
				$result = User::register($name, $email, $password);
			}
		}

		require_once(ROOT . '/views/user/register.php');
		return true;
	}

	public function actionLogin() {
		$email = "";
		$password = "";

		if(isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			//Валидация полей
			if(!User::checkEmail($email)) {
				$errors['email'] = "Неправильный email!";
			}
			if(!User::checkEmail($password)) {
				$errors['password'] = "Пароль не должно быть короче 6-ти символов!";
			}

			//Проверяем существует ли пользователь:
			$userId = User::checkUserData($email, $password);

			if($userId == false) {
				// Если данные неправильные - показываем ошибку;
				$errors['login_error'] = "Неправильные данные для входа на сайт!";
			} else {
				// Если данные правильные, запоминаем пользователя (сессия);
				User::auth($userId);

				// Перенаправляем пользователя в закрытую часть - кабинет;
				header("Location: /cabinet/");
			}
		}
		require_once(ROOT . '/views/user/login.php');
		return true;
	}

	public function actionLogout() {

		session_start();
		unset($_SESSION["user"]);
		header("Location: /");

	}
}