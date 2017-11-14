<?php
	include "IGbookDB.class.php";
	class GbookDB implements IGbookDB{
		const DB_NAME = 'gbook.db';
		protected $_db;
		function __construct(){
			if (!file_exists(self::DB_NAME)){
				$this->_db = new SQLiteDatabase(self::DB_NAME);
				$sql = "CREATE TABLE msgs(
				id INTEGER PRIMARY KEY,
				name TEXT,
				email TEXT,
				msg TEXT,
				datetime INTEGER,
				ip TEXT
				)";
				try{
					$res = $this->_db->query($sql);
					if (!$res)
						throw new SQLiteException(sqlite_error_string($this->_db->lastError()));
				}catch( SQLiteException $e){
				echo "<p>Произошла ошибка SQLite: ", $e->getMessage();
				}
			}else{
				try{
				$res = $this->_db = new SQLiteDatabase(self::DB_NAME);
				if (!$res)
						throw new SQLiteException(sqlite_error_string($this->_db->lastError()));
				}catch( SQLiteException $e){
				echo "<p>Произошла ошибка SQLite: ", $e->getMessage();
				}
			}
		}
		function __destruct(){
			unset ($_db);
		}
		function clearData($data){
			$data = stripslashes($data);
			$data = strip_tags($data);
			$data = trim($data);
			$data = sqlite_escape_string($data);
			return $data;
		}
		function savePost($name, $email, $msg){
			$ip = $_SERVER['REMOTE_ADDR'];
			$dt = time();
			$sql = "INSERT INTO msgs(
					name,
					email,
					msg,
					datetime,
					ip
					)
				VALUES (
					'$name',
					'$email',
					'$msg',
					$dt,
					'$ip'
				)";
			try{
				$res = $this->_db->query($sql);
				if (!$res)
					throw new SQLiteException(sqlite_error_string($this->_db->lastError()));
					return true;
			}catch( SQLiteException $e){
				return false;
			}
		}
		function getAll(){
			$sql = "SELECT id, name, email, msg, ip, datetime
				FROM msgs ORDER BY id DESC";
			try{
				$result = $this->_db->arrayQuery($sql, SQLITE_ASSOC);
				if (!is_array($result))
					throw new SQLiteException(sqlite_error_string($this->_db->lastError()));
				return $result;
			}catch( SQLiteException $e){
				echo "<p>Произошла ошибка SQLite: ", $e->getMessage();
			}
		}
		function deletePost($id){
			$sql = "DELETE from msgs WHERE id = $id";
			try{
				$res = $this->_db->query($sql);
				if (!$res)
					throw new SQLiteException(sqlite_error_string($this->_db->lastError()));
					return true;
			}catch( SQLiteException $e){
				return false;
			}
		}
	}
	//$gbook = new GbookDB();
/*
ЗАДАНИЕ 1
- Создайте класс GbookDB наследующий интерфейс IGbookDB
- Создайте константу класса DB_NAME и присвойте ей значение gbook.db - имя базы данных
- Создайте закрытое свойство $_db для хранения объекта соединения с базой данных
- Создайте конструктор, в котором выполняется подключение к базе данных
- Создайте деструктор, в котором выполняется закрытие соединения с базой данных
- Создайте временный объект gbook, экземпляр класса GbookDB
- Для проверки работоспособности кода запустите данный файл в браузере и убедитесь, что файл gbook.db создан
- Удалите файл gbook.db
*/

/*
ЗАДАНИЕ 2
- Измените конструктор так, чтобы в нём выполнялась проверка, существует ли база данных на следующих условиях: 
  Если базы данных не существует, создайте ее и выполните SQL-операторы для добавления таблицы (файл gbook.sql). 
  В противном случае, выполняйте подключение к существующей базе данных
- Для проверки работоспособности кода запустите данный файл в браузере и убедитесь, что файл gbook.db создан  
*/

/*
ЗАДАНИЕ 3
- Опишите метод savePost. Смотрите описание метода в интерфейсе IGbookDB
- Получите данные о текущих дате и времени
- Получите данные об IP адресе пользователя	
- Сформируйте строку запроса на добавление новой записи
- Добавьте новую запись в таблицу msgs	
*/

/*
ЗАДАНИЕ 4
- Опишите метод getAll. Смотрите описание метода в интерфейсе IGbookDB
- Сформируйте строку запроса на выборку всех данных из таблицы msgs в обратном порядке
- Получите и верните результат запроса
*/

/*
ЗАДАНИЕ 5
- Опишите метод deletePost. Смотрите описание метода в интерфейсе IGbookDB
- Сформируйте строку запроса на удаление новой записи
- Удалите запись из таблицы msgs	
*/

/*
ЗАДАНИЕ 6 (Если останется время)
- Опишите в конструкторе, а также в методах getAll, savePost и deletePost блок try-catch
- Создайте исключения на ошибки при выполнении SQL-запросов	
*/
?>