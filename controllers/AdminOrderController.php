<?php

/*
* Контроллер AdminOrderController
* Управление заказами в админпанеле
*/
class AdminOrderController extends AdminBase {
	/*
	* Action для страницы "Управление заказами"
	*/
	public function actionIndex() {
		// Проверка доступа
		self::checkAdmin();

		// Получаем список заказов для выпадающего списка
		$orderList = Order::getOrderList();

		// Подключаем вид
		require_once(ROOT.'/views/admin-order/index.php');
		return true;
	}

	/*
	* Action для страницы "Просмотр заказа"
	*/
	public function actionView($id) {
		// Проверка доступа
		self::checkAdmin();

		// Получаем данные о конкретной заказе
		$order = Order::getOrderById($id);

		// Получаем данные с идентификаторами и количеством товаров в заказе
		$productsQuantity = json_decode($order['products'], true);

		// Получаем массив с идентификаторами товаров
		$productsIds = array_keys($productsQuantity);

		// Получаем список товаров в заказе
		$products = Product::getProductsByIds($productsIds);

		// Подключаем вид
		require_once(ROOT.'/views/admin-order/view.php');
		return true;
	}

	/*
	* Action для страницы "Редактирование заказа"
	*/
	public function actionUpdate($id) {
		// Проверка доступа
		self::checkAdmin();

		// Получаем данные о конкретной категории
		$order = Order::getOrderById($id);

		// Обработка данных
		if(isset($_POST['submit'])) {
			// Если форма отправленна, то получим из нее данные
			$userName = $_POST['user_name'];
			$userPhone = $_POST['user_phone'];
			$status = $_POST['status'];

			// Сохраняем изменения
			Order::updateOrderById($id, $userName, $userPhone, $status);

			// Перенаправляем пользователя на страницу управления категориями
			header("Location: /admin/order");
		}

		require_once(ROOT.'/views/admin-order/update.php');
		return true;
	}

	/*
	* Action для страницы "Удаление заказа"
	*/
	public function actionDelete($order_id) {
		// Проверка доступа
		self::checkAdmin();

		if(isset($_POST['submit'])) {
			// Если форма отправленна, удаляем категорию
			Order::deleteOrderById($order_id);
			// Перенаправляем пользователя на страницу управления категориями
			header("Location: /admin/order");
		}

		require_once(ROOT.'/views/admin-order/delete.php');
		return true;
	}
}