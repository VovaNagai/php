<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING)); // фильтер опред. переменной, оперд. фильтрации
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    // проверка на ошибки
    $error = '';
    if(strlen($username) <= 3)
        $error = 'Введите имя';
    else if (strlen($email) <= 3)
        $error = 'Введите email';
     else if (strlen($login) <= 3)
         $error = 'Введите логин';
    else if (strlen($pass) <= 3)
        $error = 'Введите пароль';

    if ($error != '') {
        echo $error;
        exit();
    }

    $pass = md5($pass); // ф-ция для шифровки пароля

    $db = 'phpblog';
    $host = 'localhost'; // данные для локального сервера

    /* Подключение к базе данных MySQL с помощью вызова драйвера */
	$dsn = 'mysql:dbname=phpblog;host=127.0.0.1';
	$user = 'root';
	$password = '';

	try {
	    $pdo = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
	    echo 'Подключение не удалось: ' . $e->getMessage();
	}


    $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username, $email, $login, $pass]);

    echo 'Good';
