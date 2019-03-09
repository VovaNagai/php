<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
<form action="/write.php" method="POST">
    <textarea name="message" rows="8" cols="80"></textarea><br>
    <input type="submit" value="Отправить">
</form>
<?php
//    $file = fopen('text/data.txt', 'r');
//    echo fread($file, 1000);
//    fclose($file);
echo file_get_contents('text/data.txt') . '<br>'; // вывод данных
echo file_exists('text/data.txt') . '<br>'; // показывает существует ли файл (1 или пустая строка)
echo filesize('text/data.txt') . '<br>'; //показывает кол-во байт в файле
//rename('text/Ndata.txt', 'text/data.txt') . '<br>'; //переименовываем файл
//unlink('text/data.txt') // удаляет файл с сервера
?>
</body>
</html>