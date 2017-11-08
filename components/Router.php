<?php

class Router {
private $routes;

function __construct() {
	$routesPath = ROOT.'/config/routes.php';
	$this->routes = include($routesPath);
}

	/**
	* Return request string
	* @return string
	*/
	private function getURI() {
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	function run() {
		//Получить строку запроса
		$uri = $this->getURI();

		//Проверить наличие такого запроса в routes.php
		foreach($this->routes as $uriPattern => $path){
			//Сравниваем $uriPattern и $uri
			if(preg_match("~$uriPattern~", $uri)) {
				//echo "<br>Где ищем (запрос, который набрал пользователь): ".$uri;
				//echo "<br>Что ищем (Совпадение из правила): ".$uriPattern;
				//echo "<br>Кто обрабатывает: ".$path;

				// Получаем внутренний путь из внешнего согластно правилу.
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				// Определить какой контроллер и action обрабатывают запрос
				$segments = explode('/', $internalRoute);
				$controllerName = ucfirst(array_shift($segments).'Controller');
				$actionName = 'action'.ucfirst(array_shift($segments));
				//echo "<br>Controller name: ".$controllerName;
				//echo "<br>Action name: ".$actionName;
				$parameters = $segments;
				//echo "<br>";
				//print_r($parameters);

				//Подключить файл класса-контроллера
				$controllerFile = ROOT . '/controllers/' . $controllerName . ".php";
				if(file_exists($controllerFile)) {
					include_once($controllerFile);
				}

				//Создать объект, вызвать метод (т.е. action)
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if($result != null) {
					break;
				}
			}
		}
	}
}