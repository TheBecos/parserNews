<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Ошибка</title>
        <?php require(__DIR__."/../pages/head.php") ?>
    </head>
    <body>
        <div class="container-fluid">
            <header class="row">
                <h1 class="col-lg-8 offset-lg-2 text-center">Обнаружены ошибки!</h1>
                <a href="index.php" class="col-lg-2 btn btn-primary btn-lg" role="button" aria-pressed="true">Главная</a>
            </header>
            <article class="row">
                <?php
                    foreach ($viewError as $value) {
                        echo('<p class="alert alert-danger col-lg-8 offset-lg-2">' .$value. '</p>');
                    }
                ?>
            </article>
        </div>
    </body>
</html>