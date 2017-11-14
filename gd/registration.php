<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	$result = "";
	//echo $_SESSION["randStr"];
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		if (isset($_SESSION["randStr"])){
			
			$word = stripslashes(trim(strip_tags($_POST["str"])));
			if($_SESSION["randStr"] == $word) $result = "Правильно";
			else $result = "НЕ правильно";
		}else $result = "ВКЛЮЧИ ГРАФИКУ!";
	}
	/*
	ЗАДАНИЕ 1
	- Запустите сессию
	- Создайте переменную result со значением "пустая строка"("")
	- Проверьте, была ли отправлена форма
	- Проверьте, существует ли сессионная переменная randStr
		- Если переменная randStr существует и её значение равно значению введённому пользователем,
			присвойте переменной result значение "Правильно"
		- Если переменная randStr существует и её значение не равно значению введённому пользователем,
			присвойте переменной result значение "НЕ правильно"
		- Если переменная randStr не существует,
			присвойте переменной result значение "ВКЛЮЧИ ГРАФИКУ!"		
	*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
<h1>Регистрация</h1>
<form action="" method="post">
	<div>
		<img src="noise-picture.php">
	</div>
	<div>
		<label>Введите строку</label>
		<input type="text" name="str" size="6">
	</div>
	<input type="submit" value="OK">
</form>
<?php 
	echo "<h2>$result</h2>";
	/*
	ЗАДАНИЕ 2
	- Выведите значение переменной result
	*/
?>
</body>
</html>
