<!doctype html>
<html lang="ru">
<head>
   <?php
   $website_title = 'Регистрация на сайте';
   require_once 'blocks/head.php'
   ?>
</head>
<body>
<?php require_once 'blocks/header.php';?>

<main class="header_main mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
                <h4>Форма регистрации</h4>
                <form action="reg/reg.php" method="post">
                    <label for="username">Ваше имя</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <button type="submit" class="btn btn-success mt-5">Зарегистрироваться</button>
                </form>
            </div>
            <?php require_once 'blocks/aside.php';?>
        </div>
    </div>
</main>
<?php require_once 'blocks/footer.php';?>


<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<script src="js/my.js"></script>
</body>
</html>
