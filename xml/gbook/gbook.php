<?php
	define("X_FILE", "gbook.xml");
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		$name = stripslashes(trim(strip_tags($_POST["name"])));
		$email = stripslashes(trim(strip_tags($_POST["email"])));
		$msg = stripslashes(trim(strip_tags($_POST["msg"])));
		$ip = $_SERVER['REMOTE_ADDR'];
		$dt = time();
		$dom = new DomDocument("1.0", "utf-8");
		$dom->formatOutput = true; //форматирование, чтоб читаемый xml был
		$dom->preserveWhiteSpace = false; //форматирование, чтоб читаемый xml был
		if (file_exists(X_FILE)){
			$dom->load(X_FILE);
			$root = $dom->documentElement;
		}else {
			$root = $dom->createElement("users");
			$dom ->appendChild($root);
		}
		$user = $dom->createElement("user");
		$name = $dom->createElement("name", $name);
		$email = $dom->createElement("email", $email);
		$msg = $dom->createElement("msg", $msg);
		$ip = $dom->createElement("ip", $ip);
		$datetime = $dom->createElement("datetime");
		$dtText = $dom->createTextNode($dt);
		$datetime ->appendChild($dtText);
		$user ->appendChild($name);
		$user ->appendChild($email);
		$user ->appendChild($msg);
		$user ->appendChild($ip);
		$user ->appendChild($datetime);
		$root ->appendChild($user);
		$dom->save(X_FILE);
		header("Location: gbook.php");exit;
	}
/* 
ЗАДАНИЕ 1
- Создайте константу для хранения имени XML-файла
- Проверьте, была ли отправлена HTML-форма?
	Если она была отправлена: отфильтруйте полученные данные
- Получите данные об IP-адресе пользователя	
- Получите данные о текущих дате и времени
*/

/*
ЗАДАНИЕ 2
- Создайте объект DOMDocument
- Проверьте, существует ли xml-документ с данными
	Если существует, загрузите его в созданный объект
	и получите корневой элемент
	Если не существует, создайте корневой элемент "users"
	и привяжите его к объекту
*/

/*
ЗАДАНИЕ 3
- Cоздайте новый XML-элемент "user" для очередной записи
- Cоздайте XML-элементы для всех данных Гостевой книги:
	name, email, msg, IP, datetime
- Cоздайте текстовые узлы для всех указанных элементов
- Привяжите текстовые узлы к соответствующим XML-элементам
- Привяжите XML-элементы с данными заказа к XML-элементу "user"
- Привяжите XML-элемент "user" к корневому элементу "users"
- Сохраните файл
- Перезапросите страницу для избавления от посланных данных
*/	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Гостевая книга</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Ваше имя:<br />
<input type="text" name="name" /><br />
Ваш E-mail:<br />
<input type="text" name="email" /><br />
Сообщение:<br />
<textarea name="msg" cols="50" rows="5"></textarea><br />
<br />
<input type="submit" value="Добавить!" />

</form>

<?php
	if (file_exists(X_FILE)){
		$sxml = simplexml_load_file(X_FILE);
		
		/*
		это мой код
		foreach($sxml->user as $item){
			echo "<p>";
			echo $item->name;
			echo "<br>";
			echo $item->email;
			echo "<br>";
			echo $item->msg;
			echo "<br>";
			echo $item->ip;
			echo "<br>";
			echo date("d-m-Y H:i:s", ($item->datetime)*1);
			echo "</p>";
		}*/
		$users = (array)$sxml;
		//var_dump($users);
		if (is_array($users["user"]))
			$users = array_reverse($users["user"]); //если только одна запись
		foreach($users as $user){
			$dt = date("d-m-Y H:i:s", ($item->datetime)*1);
			$msg = nl2br($user->msg);
			echo <<<LABEL
				<hr>
				<p>
					<a href="mailto:{$user->email}">{$user->name}</a>
					from [{$user->ip}] @{$dt}<br>
					{$msg}
				</p>
LABEL;
		}
	}
	
/*
ЗАДАНИЕ 4
- Создайте объект SimpleXML и загрузите в него XML-документ
- Выведите в браузер все сообщения, а также информацию
  об авторе каждого сообщения в произвольной форме
  в обратном порядке
*/
?>

</body>
</html>