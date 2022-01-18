<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Панель администратора - Авторизация</title>
	<?php require(__DIR__ . "/../pages/head.php") ?>
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <h1 class="col-lg-8 offset-lg-2">Вход в Панель администратора</h1>
        <a href="index.php" class="col-lg-2 btn btn-primary btn-lg" role="button">Главная</a>
    </header>
    <article class="row card col-lg-8 offset-lg-2 bg-dark text-white">
        <form method="post" action="?action=login">
            <div class="form-group">
                <label>Логин</label>
                <input type="text" name="login" class="form-control bg-dark text-white" required>
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" class="form-control bg-dark text-white" required>
            </div>
            <input type="submit" class="btn btn-light" value='Войти'>
        </form>
    </article>
</div>
</body>
</html>