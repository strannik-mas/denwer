<?php
	function onStart($sax, $tag, $attribute){
		if ($tag !="CATALOG" and $tag != "BOOK")
			echo "<td>";
		if ($tag =="BOOK")
			echo "<tr>";
	}
	function onEnd($sax, $tag){
		if ($tag !="CATALOG" and $tag != "BOOK")
			echo "</td>";
		if ($tag =="BOOK")
			echo "</tr>";
	}
	function onText($sax, $text){
		echo $text;
	}
	$sax = xml_parser_create ("UTF-8");
	xml_set_element_handler ($sax, "onStart", "onEnd");
	xml_set_character_data_handler ($sax, "onText");
	/*
	ЗАДАНИЕ 1
	- Опишите функцию-обработчик начальных тегов
	- Опишите функцию-обработчик закрывающих тегов
	- Опишите функцию-обработчик текстового содержимого
	- Создайте парсер
	- Зарегистрируйте функцию-обработчики начальных и конечных тегов
	- Зарегистрируйте функцию-обработчик текстового содержимого
	*/
?>
<html>
	<head>
		<title>Каталог</title>
	</head>
	<body>
	<h1>Каталог книг</h1>
	<table border="1" width="100%">
		<tr>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена, руб</th>
		</tr>
	<?php
		$f = file_get_contents("catalog.xml");
		xml_parse($sax, $f);
		/*
		ЗАДАНИЕ 2
		- Запустите парсер
		*/
	?>
	</table>
	</body>
</html>