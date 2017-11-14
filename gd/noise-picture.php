<?php
	session_start();
	$nChars = 5;
	$x = 20;
	$y = 30;
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';	
	$_SESSION["randStr"] = '';
	for ($i = 1; $i<= $nChars; $i++ ){
		$_SESSION["randStr"] .= $characters[mt_rand(0, strlen($characters)-1)];
	}
	/*
	$_SESSION["randStr"] = substr(md5(uniqid()), 0, $nChars); можно так
	echo $_SESSION["randStr"];
	*/

	$img = imageCreateFromJPEG("images/noise.jpg");
	imageAntiAlias($img, true);	
	$red = imageColorAllocate($img, 255, 0, 0);
	
	for ($i = 0; $i< $nChars; $i++ ){
		imageTtfText($img, rand(20,30), rand(-70,70), $x, $y, $red,"fonts/bellb.ttf", $_SESSION["randStr"][$i]);
		//$_SESSION["randStr"]{$i}
		$x +=30;
	}
	header("Content-Type: image/jpeg");
	imageJPEG($img, "", 90);
	//if (!imageJPEG($img, "", 90)) unset($_SESSION["randStr"]);
	/*	
	ЗАДАНИЕ 1
	- Запустите сессию
	- Создайте переменную nChars(количество выводимых на картинке символов)
		и присвойте ей произвольное значение(рекомендуемое: 5)
	- Сгенерируйте случайную строку длиной nChars символов
	- Создайте сессионную переменную randStr и присвойте ей сгенерированную строку
	*/
	
	/*
	ЗАДАНИЕ 2
	- Создайте изображение на основе файла "images/noise.jpg"
	- Создайте цвет для рисования
	- Включите сглаживание
	- Задайте начальные координаты x и y для отрисовки строки(рекомендуемые: 20 и 30)
	- Используя цикл for отрисуйте строку посимвольно
	- Для каждого символа используйте случайные значение размера и угла наклона
	- Отдайте полученный результат как jpeg-изображение с 10% сжатием
	*/
	
	
?>
