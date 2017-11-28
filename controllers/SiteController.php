<?php

class SiteController {
	public function actionIndex() {

		$categories = array();
		$categories = Category::getCategoriesList();

		$latestProduct = array();
		$latestProduct = Product::getLatestProducts();

		$recomendedProducts = array();
		$recomendedProducts = Product::getRecomendedProducts();

		require_once(ROOT.'/views/site/index.php');
		return true;
	}

	public function actionContact() {

		$userEmail = '';
		$userText = '';
		$result = false;

		if(isset($_POST['submit'])) {
			$userEmail = $_POST['userEmail'];
			$userText = $_POST['userText'];

			$errors = false;

			//Валидация паролей
			if(!User::checkEmail($userEmail)) {
				$errors['userEmail'] = 'Неправельный Email!';
			}

			if($errors == false) {
				$adminEmail = 'optimist0706@gmail.com';
				$sabject = 'Тема письма';
				$message = "Текст: {$userText}. От {$userEmail}";
				$result = mail($adminEmail, $sabject, $message);
				$result = true;
			}

		}
		require_once(ROOT.'/views/site/contact.php');
		return true;
	}
	public function actionAbout() {
		require_once(ROOT.'/views/site/about.php');
		return true;
	}
}