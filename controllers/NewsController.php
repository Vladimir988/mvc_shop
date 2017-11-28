<?php

class NewsController {

	function actionIndex(){
		$newsList = array();
		$newsList = News::getNewsList();

		$categories = Category::getCategoriesList();

		require_once(ROOT.'/views/news/index.php');

		return true;
	}

	function actionView($id){
		$categories = Category::getCategoriesList();
		$news_category = News::getNewsCategoryById($id);
		if($id) {
			$newsList = News::getNewsItemById($id);
			require_once(ROOT.'/views/news/single-post.php');
		} 

		return true;
	}

}