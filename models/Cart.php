<?php

class Cart {
	public static function addProduct($id) {
		$id = intval($id);

		//Пустой масив для товаров в корзине
		$productsInCart = array();

		//Если в корзине уже есть товары (они хранятся в сессии)
		if(isset($_SESSION['products'])) {
			$productsInCart = $_SESSION['products'];
		}

		if(array_key_exists($id, $productsInCart)) {
			$productsInCart[$id] ++;
		} else {
			$productsInCart[$id] = 1;
		}

		$_SESSION['products'] = $productsInCart;

		return self::countItems();
	}

	/**
	* Удаляет товар с указанным id из корзины
	* @param integer $id <p>id товара</p>
	*/
	public static function deleteProduct($id) {
		// Получаем масив с идентификаторами и количеством товаров в корзине
		$productsInCart = self::getProducts();

		// Удаляем из массива элемент с указаным id
		unset($productsInCart[$id]);

		// Записывает массив с удаленным элементом в сессию
		$_SESSION['products'] = $productsInCart;
	}

	/*
	* Подсчитает количество товаров в корзине (в сессии)
	* @return int
	*/
	public static function countItems() {
		if(isset($_SESSION['products'])) {
			$count = 0;
			foreach($_SESSION['products'] as $id => $quantity) {
				$count = $count + $quantity;
			}
			return $count;
		} else {
			return 0;
		}
	}

	public static function getProducts() {
		if(isset($_SESSION['products'])) {
			return ($_SESSION['products']);
		}
		return false;
	}

	public static function getTotalPrice($products) {
		$productsInCart = self::getProducts();

		$total = 0;

		if($productsInCart) {
			foreach($products as $item) {
				$total += $item['price'] * $productsInCart[$item['id']];
			}
		}
		return $total;
	}

	public static function clear() {
		if(isset($_SESSION['products'])) {
			unset($_SESSION['products']);
		}
	}
}