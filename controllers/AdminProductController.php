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
		if(isset($_POST['submit'])) {
			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['availability'] = $_POST['availability'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];

			// Наличие ошибок в форме
			$errors = false;

			if(!isset($options['name']) or empty($options['name'])) {
				$errors['name'] = 'Заполните поле имени товара!';
			}

			if($errors == false) {
				$id = Product::createProduct($options);

				// Если запись добавлена
				if($id) {
					// Проверим загружалось ли через форму изображение
					echo "<pre>";
					print_r($_FILES['image']);die();
					echo "</pre>";
					if(is_uploaded_file($_FILES['image']['tmp_name'])) {
						move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products{id}.jpg");
					}
				};
				// Перенаправляем пользователя на страницу управления товарами
				header("Location: admin/product");
			}
		}
		require_once(ROOT.'/views/admin-product/create.php');
		return true;
	}

	/*
	* Action для страницы "Удалить товар"
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
		return true;
	}

	/*
	* Action для страницы "Редактировать товар"
	*/
	public function actionUpdate($id) {
		// Проверка доступа
		self::checkAdmin();

		// Получаем список категорий для выпадающего списка
		$categoriesList = Category::getCategoriesListAdmin();

		// Получаем данные о конкретном заказе
		$product = Product::getProductById($id);

		// Обработка формы
		if(isset($_POST['submit'])) {
			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['availability'] = $_POST['availability'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];

			// Сохраняем изменения
			if(Product::updateProductById($id, $options)) {

				// Если запись сохранена
				// Проверим загруэалось ли через форму изображение
				if(is_uploaded_file($_FILES['image']['tmp_name'])) {
					// Если загружалось, перенести его в нужную папку, и назначить новое имя
					var_dump(move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/upload/images/products{id}.jpg'));
				}
			}
			// Перенаправляем пользователя на страницу управления товарами
			header("Location: /admin/product");
		}
		require_once(ROOT.'/views/admin-product/update.php');
		return true;
	}
}