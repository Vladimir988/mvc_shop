<?php

class NewsController {

	function actionIndex(){
		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT.'/views/news/index.php');

		return true;
	}

	function actionView($id){
		if($id) {
			$newsList = News::getNewsItemById($id);
			require_once(ROOT.'/views/news/single-post.php');
		} 

		return true;
	}

}