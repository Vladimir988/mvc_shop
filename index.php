<?php

	//FRONT CONTROLLER


	// 1. Общие настройки
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	// 2. Подключение файлов системы
	define('ROOT', dirname(__FILE__));
	require_once(ROOT.'/components/Autoload.php');

	// 3. Установка соединения с БД

	// 4. Вызов router
	$routes = new Router();
	$routes->run();