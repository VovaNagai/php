<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сессия и cookie</title>
</head>
<body>
<form action="action.php" method="POST">
    <label for="name">Name: </label>
    <input type="text" name="name">
    <label for="email">Email: </label>
    <input type="email" name="email">
    <button type="submit">Отправить</button>
</form>
<?php
    if ($_SESSION['name'] != "" && $_SESSION['email'] != "") {
        echo 'Имя пользователя: ' . $_SESSION['name'] . '<br>';
        echo 'Email пользователя: ' . $_SESSION['email'] . '<br>';
    }
    if ($_COOKIE['name'] != "" && $_COOKIE['email'] != "") {
        echo 'Имя пользователя: ' . $_COOKIE['name'] . '<br>';
        echo 'Email пользователя: ' . $_COOKIE['email'] . '<br>';
    }
?>
</body>
</html>