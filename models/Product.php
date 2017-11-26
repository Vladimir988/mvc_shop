<?php

class Product {
	const SHOW_BY_DEFAULT = 6;

	/*
	* Returns an array of products
	*/
	public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {
		$count = intval($count);
		$db = Db::getConnection();
		$productsList = array();
		$result = $db->query('SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY id DESC LIMIT ' . $count);


		$i = 0;
		while($row = $result->fetch()) {
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['image'] = $row['image'];
			$productsList[$i]['price'] = $row['price'];
			$productsList[$i]['is_new'] = $row['is_new'];
			$i++;
		}
		return $productsList;
	}

	/*
	* Returns an array of recomended products
	*/
	public static function getRecomendedProducts($count = 12) {
		$count = intval($count);
		$db = Db::getConnection();
		$recomendedProducts = array();

		$sql = ("SELECT id, name, price, image, is_new FROM product WHERE status = '1' AND is_recommended = '1' ORDER BY id DESC LIMIT " . $count);

		$result = $db->query($sql);

		$i = 0;
		while($row = $result->fetch()) {
			$recomendedProducts[$i]['id'] = $row['id'];
			$recomendedProducts[$i]['name'] = $row['name'];
			$recomendedProducts[$i]['price'] = $row['price'];
			$recomendedProducts[$i]['image'] = $row['image'];
			$recomendedProducts[$i]['is_new'] = $row['is_new'];
			$i++;
		}
		return $recomendedProducts;
	}

	public static function getProductsListByCategory($categoryId = false, $page = 1) {
		if($categoryId) {
			$page = intval($page);
			$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

			$db = Db::getConnection();
			$product = array();
			$result = $db->query("SELECT id, name, price, image, is_new FROM product WHERE status = '1' AND category_id = '$categoryId' ORDER BY id DESC LIMIT " . self::SHOW_BY_DEFAULT . ' OFFSET ' . $offset);

			$i = 0;
			while($row = $result->fetch()) {
				$product[$i]['id'] = $row['id'];
				$product[$i]['name'] = $row['name'];
				$product[$i]['image'] = $row['image'];
				$product[$i]['price'] = $row['price'];
				$product[$i]['is_new'] = $row['is_new'];
				$i++;
			}
			return $product;
		}
	}

	/*
	* Return product item by id
	* @param integer $id
	*/
	public static function getProductById($id) {
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query('SELECT * FROM product WHERE id=' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	/*
	* Return total products
	*/
	public static function getTotalProductsInCategory($categoryId) {
		$db = Db::getConnection();

		$result = $db->query('SELECT count(id) AS count FROM product WHERE status="1" AND category_id ="'.$categoryId.'"');
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$row = $result->fetch();

		return $row['count'];
	}

	/*
	* Returns products
	*/
	public static function getProductsByIds($idsArray) {
		$products = array();

		$db = Db::getConnection();

		$idsString = implode(',', $idsArray);

		$sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		$products = array();
		while($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['code'] = $row['code'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$i++;
		}
		return $products;
	}

	/*
	* Returns products list
	* Returns array <p>Массив с товарами</p>
	*/
	public static function getProductsList() {
		$db = Db::getConnection();

		// Получение и возврат товаров
		$result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
		$productList = array();
		$i = 0;
		while($row = $result->fetch()) {
			$productList[$i]['id'] = $row['id'];
			$productList[$i]['name'] = $row['name'];
			$productList[$i]['code'] = $row['code'];
			$productList[$i]['price'] = $row['price'];
			$i++;
		}
		return $productList;
	}

	/*
	* Удаляет товар с указаным id
	* @param integer $id
	* @return boolean
	*/
	public static function deleteProductById($id) {
		$db = Db::getConnection();

		$sql = 'DELETE FROM product WHERE id = :id';

		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}
}