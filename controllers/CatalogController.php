<?php

class CatalogController {
	public function actionIndex() {

		$categories = array();
		$categories = Category::getCategoriesList();

		$latestProduct = array();
		$latestProduct = Product::getLatestProducts();

		require_once(ROOT.'/views/catalog/index.php');
		return true;
	}

	public function actionCategory($categoryId, $page = 1) {

		$categories = array();
		$categories = Category::getCategoriesList();

		$categoryProducts = array();
		$categoryProducts = Product::getProductsListByCategory($categoryId, $page);

		$total = Product::getTotalProductsInCategory($categoryId);

		// Создаем объект Pagination - постарничная навигация
		$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/catalog/category.php');
		return true;
	}
}