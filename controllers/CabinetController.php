<?php

class CabinetController {
	public function actionIndex() {
		//Получаем идентификатор пользователя из сессии
		$userId = User::checkLogged();

		//Получаем информацию о пользователе из БД
		$user = User::getUserById($userId);

		require_once(ROOT . '/views/cabinet/index.php');
		return true;
	}

	public function actionEdit() {
		//Получаем идентификатор пользователя из сессии
		$userId = User::checkLogged();

		//Получаем информацию о пользователе из БД
		$user = User::getUserById($userId);

		$name = $user['name'];
		$password = $user['password'];

		$result = false;

		if(isset($_POST['submit'])) {
			$new_name = $_POST['name'];
			$new_password = $_POST['password'];

			$errors = false;

			if(!User::checkName($new_name)) {
				$errors['name'] = 'Имя не должно быть короче 5 символов!';
			}

			if($new_name == $name and $new_password == $password) {
				$errors['result'] ='Так будем что-то менять или как ?!';
			}

			if(!User::checkPassword($new_password)) {
				$errors['password'] = 'Пароль не должно быть короче 6 символов!';
			}

			if($errors == false) {
				$result = User::edit($userId, $new_name, $new_password);
			}
		}
		require_once(ROOT . '/views/cabinet/edit.php');
		return true;
	}
}