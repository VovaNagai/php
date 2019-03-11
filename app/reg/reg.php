<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING)); // фильтер опред. переменной, оперд. фильтрации
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    // проверка на ошибки, пока без ajax

    if(strlen($username) <= 3)
        exit();
    else if (strlen($email) <= 3)
        exit();
     else if (strlen($login) <= 3)
        exit();
    else if (strlen($password) <= 3)
        exit();

    $hash = "d6f6gf345hhgr3etwer42ferg43s";
    $password = md5($password . $hash); // ф-ция для шифровки пароля

    //$user = 'root';
    //$password = 'root';
    $db = 'phpblog';
    $host = 'localhost'; // данные для локального сервера

    /* Подключение к базе данных MySQL с помощью вызова драйвера */
	$dsn = 'mysql:dbname=phpblog;host=127.0.0.1';
	$user = 'falcon';
	$password = '';

	try {
	    $pdo = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
	    echo 'Подключение не удалось: ' . $e->getMessage();
	}

	var_dump($pdo);
    $sql = 'INSERT INTO users(name, email, login, password) VALUES(?, ?, ?, ?)';
    $query = $pdo->prepare($sql);

	var_dump($query);
    $query->execute([$username, $email, $login, $password]);
