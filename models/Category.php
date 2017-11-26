<?php

class Category {
	/**
	* Returns an array of categories
	*/
	public static function getCategoriesList() {
		$db = Db::getConnection();

		$categoryList = array();

		$result = $db->query('SELECT id, name FROM category ORDER BY sort_order ASC');

		$i = 0;
		while($row = $result->fetch()) {
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name'] = $row['name'];
			$i++;
		}

		return $categoryList;
	}

	/**
	* Returns an array of categories for Administator
	*/
	public static function getCategoriesListAdmin() {
		$db = Db::getConnection();

		$sql = 'SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC';

		$result = $db->query($sql);

		// Получение и возврат результатов
		$categoriesList = array();
		$i = 0;
		while($row = $result->fetch()) {
			$categoriesList[$i]['id'] = $row['id'];
			$categoriesList[$i]['name'] = $row['name'];
			$categoriesList[$i]['sort_order'] = $row['sort_order'];
			$categoriesList[$i]['status'] = $row['status'];
			$i++;
		}
		return $categoriesList;
	}
}