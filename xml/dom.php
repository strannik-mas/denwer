<?php
	$dom = new DomDocument();
	$dom->load("catalog.xml");
	$kor = $dom->documentElement;
	/*
	ЗАДАНИЕ 1
	- Создайте объект DOM
	- Загрузите XML-документ в объект
	- Получите корневой элемент
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
	/*
	$a = $dom->getElementsByTagName("author");
	$t = $dom->getElementsByTagName("title");
	$p = $dom->getElementsByTagName("pubyear");
	$pr = $dom->getElementsByTagName("price");
	$books = $dom->getElementsByTagName("book");
		//var_dump ($a);
	$i = 0;
	foreach($books as $book){
		echo "<tr>";
		//$a = $book->getElementByTagName("author");
		echo "<td>".$a->item($i)->textContent."</td>";
		echo "<td>".$t->item($i)->textContent."</td>";
		echo "<td>".$p->item($i)->textContent."</td>";
		echo "<td>".$pr->item($i)->textContent."</td>";
		echo "</tr>\n";
		$i++;
	}
	// это мой код
	*/
	foreach($kor->childNodes as $book){
		if($book->nodeType == 1){
			echo "<tr>";
				foreach($book->childNodes as $item){
					if($item->nodeType == 1){
						echo "<td>".$item->textContent."</td>";
					}
				}
			echo "</tr>\n";
		}
	}
	/*
	ЗАДАНИЕ 2
	- Заполните таблицу необходимыми данными
	*/
?>
	</table>
</body>
</html>





