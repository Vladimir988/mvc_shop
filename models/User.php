<?php

class User {
	public static function register () {

	}

	/*
	* Проверка имени: не менее 5 символов
	*/
	public static function checkName($name) {
		if(strlen($name) >= 5) {
			return true;
		}
		return false;
	}

	/*
	* Проверка password: не менее 6 символов
	*/
	public static function checkPassword($password) {
		if(strlen($password) >= 6) {
			return true;
		}
		return false;
	}

	/*
	* Проверка email
	*/
	public static function checkEmail($email) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}
}