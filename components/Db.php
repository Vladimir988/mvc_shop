<?php
	class Db {
		public static function getConnection() {
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);

			/*
				$host = 'myshop';
				$dbname = 'mvc_site';
				$user = 'root';
				$password = '';
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
			*/

			$dns = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dns, $params['user'], $params['password']);
			//$db->exec("set names utf8");

			return $db;
		}
	}