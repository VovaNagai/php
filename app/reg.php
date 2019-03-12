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
                <form action="" method="post">
                    <label for="username">Ваше имя</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control">
                    <label for="pass">Пароль</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-4" id="errorBlock"></div>
                    <button id="reg_user" type="button" class="btn btn-success mt-5">Зарегистрироваться</button>
                </form>
            </div>
            <?php require_once 'blocks/aside.php';?>
        </div>
    </div>
</main>
<?php require_once 'blocks/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('#reg_user').click(function () {
        var name = $('#username').val();
        var email = $('#email').val();
        var login = $('#login').val();
        var pass = $('#pass').val();

        $.ajax({
            url: 'reg/reg.php',
            type: 'POST',
            cache: false,
            data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
            dataType: 'html',
            success: function(data) {
                if(data == 'Good') {
                    $('#reg_user').text('Good');
                    $('#errorBlock').hide();
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        });
    });
</script>
</body>
</html>
