<?php
	// Сокетное соединение
	// Создание сокета (host+порт)
	$s = fsockopen("localhost", 80, $e1, $e2, 30);
	// Создание POST-строки
	
	$str = "name=John&age=25";
	// Посылка HTTP-запроса
	$out = "POST http://localhost/denwer/socket/dummy.php HTTP/1.1\r\n";
	$out .= "Host: localhost\r\n";
	$out .="Content-Type: application/x-www-form-urlencoded\r\n"; //от умолчания атрибута inctype формы
	$out .= "Content-Length: ".strlen($str)."\r\n\r\n";
	$out .= $str."\r\n\r\n";
	fputs($s, $out);
	// Получение и вывод ответа
	while(!feof($s)){
		echo fgets($s)."<br>";
	}

	// Закрытие соединения
	fclose($s);
	$hosts = gethostbynamel('www.maxnet.ua');
	print_r($hosts);
	echo "<br>", exec('whoami');
?>