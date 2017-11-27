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
	* Returns an array of categories
	*/
	public static function getCategoryById($id) {
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = "SELECT * FROM category WHERE id = ".$id;
			$result = $db->query($sql);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
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

	/**
	* Returns an array of categories for Administator
	*/
	public static function createCategory($name, $sortOrder, $status) {
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = "INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)";

		// Подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':sort_order', $sortOrder, PDO::PARAM_STR);
		$result->bindParam(':status', $status, PDO::PARAM_STR);
		if($result->execute()) {
			return $db->lastInsertId();
		}
		// Иначе возвращаем false
		return false;
	}

	/**
	* Returns an array of categories for Administator
	*/
	public static function updateCategoryById($id, $name, $sortOrder, $status) {
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = "UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id";

		// Подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':sort_order', $sortOrder, PDO::PARAM_STR);
		$result->bindParam(':status', $status, PDO::PARAM_STR);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		return $result->execute();
	}

	/**
	* Returns an array of categories for Administator
	*/
	public static function deleteCategoryById($category_id) {
		$db = Db::getConnection();

		$sql = "DELETE FROM category WHERE id = :id";

		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $category_id, PDO::PARAM_INT);

		return $result->execute();
	}
}