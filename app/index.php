<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'PHP blog';
    require_once 'blocks/head.php'
    ?>
</head>
<body>
    <?php require_once 'blocks/header.php';?>

    <main class="header_main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    Main
                </div>
                <?php require_once 'blocks/aside.php';?>
            </div>
        </div>
    </main>
    <?php require_once 'blocks/footer.php';?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/my.js"></script>
</body>
</html>
