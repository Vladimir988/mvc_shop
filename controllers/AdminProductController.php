<?php

/*
* Контроллер AdminProductController
* Управление товарами в админ панеле
*/
class AdminProductController extends AdminBase {
	/*
	* Action для страницы "Управление товарами"
	*/
	public function actionIndex() {
		// Проверка доступа
		self::checkAdmin();

		// Подключаем список товаров
		$productsList = Product::getProductsList();

		// Подключаем вид
		require_once(ROOT.'/views/admin-product/index.php');
		return true;
	}

	/*
	* Action для страницы "Добавить товар"
	*/
	public function actionCreate() {
		// Проверка доступа
		self::checkAdmin();

		// Получаем список категорий для выпадающего списка
		$categoriesList = Category::getCategoriesListAdmin();

		// Обработка формы

	}

	/*
	* Action для страницы "Добавить товар"
	*/
	public function actionDelete($id) {
		// Проверка доступа
		self::checkAdmin();

		// Обработка формы
		if(isset($_POST['submit'])) {
			// Если форма отправленна удаляем товар
			Product::deleteProductById($id);

			// Перенаправляем администратора на страницу управления товарами
			header("Location: /admin/product");
		}

		// Подключаем вид
		require_once(ROOT.'/views/admin-product/delete.php');
	}
}