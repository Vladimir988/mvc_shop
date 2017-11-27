<?php

class Order {
	/*
	* Сохранение заказа
	* @param type $name
	* @param type $email
	* @param type $password
	* @return type
	*/
	public static function save($userName, $userPhone, $userComment, $userId, $products) {
		$products = json_encode($products);
		
		$db = Db::getConnection();

		$sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';


		$result = $db->prepare($sql);
		$result->bindParam(':user_name', $userName, PDO::PARAM_STR);
		$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
		$result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
		$result->bindParam(':user_id', $userId, PDO::PARAM_STR);
		$result->bindParam(':products', $products, PDO::PARAM_STR);

		return $result->execute();
	}

	public static function getOrderList() {
		$db = Db::getConnection();

		$sql = "SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY date ASC";

		$result = $db->query($sql);

		// Получение и возврат результатов
		$orderList = array();
		$i = 0;
		while($row = $result->fetch()) {
			$orderList[$i]['id'] = $row['id'];
			$orderList[$i]['user_name'] = $row['user_name'];
			$orderList[$i]['user_phone'] = $row['user_phone'];
			$orderList[$i]['date'] = $row['date'];
			$orderList[$i]['status'] = $row['status'];
			$i++;
		}
		return $orderList;
	}

	public static function getOrderById($id) {
		$id = intval($id);

		if($id) {
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = "SELECT * FROM product_order WHERE id = " . $id;
			$result = $db->query($sql);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function updateOrderById($id, $userName, $userPhone, $status) {
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = "UPDATE product_order SET user_name = :name, user_phone = :phone, status = :status WHERE id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':name', $userName, PDO::PARAM_STR);
		$result->bindParam(':phone', $userPhone, PDO::PARAM_STR);
		$result->bindParam(':status', $status, PDO::PARAM_STR);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		return $result->execute();
	}

	public static function deleteOrderById($order_id) {
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = "DELETE FROM product_order WHERE id = :id";
		$result = $db->prepare($sql);
		$result->bindParam(':id', $order_id, PDO::PARAM_INT);

		return $result->execute();
	}

	public static function getStatusText($status) {
		switch($status) {
			case '0':
				return 'Новый заказ'; break;
			case '1':
				return 'В обработке'; break;
			case '2':
				return 'Доставляется'; break;
			case '3':
				return 'Закрыт'; break;
		}
	}
}