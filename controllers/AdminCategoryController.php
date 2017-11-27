<?php

/*
* Контроллер AdminCategoryController
* Управление категориями товаров в админпанеле
*/
class AdminCategoryController extends AdminBase {
	/*
	* Action для страницы "Управление категориями"
	*/
	public function actionIndex() {
		// Проверка доступа
		self::checkAdmin();

		// Получаем список категорий для выпадающего списка
		$categoriesList = Category::getCategoriesListAdmin();

		// Подключаем вид
		require_once(ROOT.'/views/admin-category/index.php');
		return true;
	}

	/*
	* Action для страницы "Добавить категорию"
	*/
	public function actionCreate() {
		// Проверка доступа
		self::checkAdmin();

		// Обработка данных
		if(isset($_POST['submit'])) {
			// Если форма отправленна, то получим из нее данные
			$name = $_POST['name'];
			$sortOrder = $_POST['sort_order'];
			$status = $_POST['status'];

			// Флаг ошибок в форме
			$errors = false;

			// При необходимости можно валидировать поля в соответствии с требованиями
			if(!isset($name) or empty($name)) {
				$errors['name'] = "Заполните поля имя";
			}

			if($errors == false) {
				Category::createCategory($name, $sortOrder, $status);

				// Перенаправляем пользователя на страницу управления категориями
				header("Location: /admin/category");
			}
		}
		require_once(ROOT.'/views/admin-category/create.php');
		return true;
	}

	/*
	* Action для страницы "Редактировать категорию"
	*/
	public function actionUpdate($id) {
		// Проверка доступа
		self::checkAdmin();

		// Получаем данные о конкретной категории
		$category = Category::getCategoryById($id);

		// Обработка данных
		if(isset($_POST['submit'])) {
			// Если форма отправленна, то получим из нее данные
			$name = $_POST['name'];
			$sortOrder = $_POST['sort_order'];
			$status = $_POST['status'];

			// Сохраняем изменения
			Category::updateCategoryById($id, $name, $sortOrder, $status);

			// Перенаправляем пользователя на страницу управления категориями
			header("Location: /admin/category");
		}
		require_once(ROOT.'/views/admin-category/update.php');
		return true;
	}


	/*
	* Action для страницы "Удалить категорию"
	*/
	public function actionDelete($category_id) {
		// Проверка доступа
		self::checkAdmin();

		// Обработка данных
		if(isset($_POST['submit'])) {
			// Если форма отправленна, удаляем категорию
			Category::deleteCategoryById($category_id);

			// Перенаправляем пользователя на страницу управления категориями
			header("Location: /admin/category");
		}
		require_once(ROOT.'/views/admin-category/delete.php');
		return true;
	}
}