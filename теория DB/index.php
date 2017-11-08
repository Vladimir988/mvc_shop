<?php
	
	$cnn = mysqli_connect('localhost', 'root', '', 'mvc_site');
	mysqli_set_charset($cnn, 'utf8');

	//Check connection
	if(mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql = "INSERT INTO news_category VALUES (NULL, 'Категория 3', 'Описание 2', 1, 1)";
	//$info = mysqli_query($cnn, $sql);

	$sql = "INSERT INTO `news` (`h1`, `short_content`, `content`, `category_id`, `author_id`, `date`, `preview`, `status`) VALUES ('3234234', '3234234', '3234234', '3234234', '3234234', CURRENT_TIMESTAMP, '1', '1')";
	//$info = mysqli_query($cnn, $sql);

	$sql = "DELETE FROM news_category WHERE id>'10'";

	$sql = "UPDATE news SET status='1'";

	$sql = "UPDATE news SET h1='Новый заголовок' WHERE id='9'";

	//echo mysqli_affected_rows($cnn);

	/**
	* SELECT что_выбрать
	*	[FROM таблица
	* [WHERE условие
	* [GROUP BY поле]
	* [ORDER BY поле]
	* [LIMIT количество]]
	*/
	$sql = "SELECT * FROM news";
	$info = mysqli_query($cnn, $sql);
	//$count = mysqli_num_rows($info);

	if($count){
		while($rows = mysqli_fetch_array($info, MYSQLI_ASSOC)){
			echo $rows['h1']."<br>";
		}
	}

	/*
	* Агрегатные функции
	* COUNT - количество строк в таблице
	* SUM - сумма значений выбранного поля
	* AVG - среднее значение по выбраному полю (average)
	* MAX, MIN - наибольшее и наименьшее значение данного поля
	*/

	//$sql = "SELECT COUNT(*) FROM 'news'";
	//$sql = "SELECT name, COUNT(*) AS count FROM 'user' GROUP BY name";