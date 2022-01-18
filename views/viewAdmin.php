<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Новости - Панель администратора</title>
    <?php require(__DIR__ . "/../pages/head.php") ?>
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <h1 class="col-lg-6 offset-lg-1">Управление источниками</h1>
        <h5 class="col-lg-2" style="margin-top: 15px">Приветствую, <b><?= $_SESSION['login'] ?></b></h5>&nbsp;
        <a href="/" class="col-lg-1 btn btn-primary btn-lg" role="button">Новости</a>
        &nbsp;
        <a href="?action=logout" class="col-lg-1 btn btn-danger btn-lg" role="button">Выход</a>
    </header>
    <article class="row">
        <div class="col-lg-10 offset-lg-1 bg-dark text-white articleAdmin rounded">
            <a href="?action=addSource" class="col-lg-2 offset-lg-10 btn btn-success btn-lg" role="button">Добавить</a>
            <ul class="list-group list-group-flush">
                <?php
                if (empty($listSource)) {
                    echo('<p class="alert bg-dark text-white">Нет источников</p>');
                } else {
                    $i = 1;
                    foreach ($listSource as $value) {
                        echo('<li class="list-group-item bg-dark text-white">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    ' . $value['name'] . '</label>
                                                    <span class="pull-right">
                                                        <a href="?action=parseNewsSource&source_id=' . $value['source_id'] . '" class="form-parse-label"" data-id="' . $value['source_id'] . '" title="Распарсить новости"><i class="fas fa-download fa-sm" style="color: lawngreen"></i></a>
                                                        <a href="?action=editSource&source_id=' . $value['source_id'] . '" class="form-edit-label" data-id="' . $value['source_id'] . '" title="Изменить"><i class="fas fa-pencil-alt fa-sm" style="color: royalblue"></i></a>
                                                        <a href="?action=deleteSource&source_id=' . $value['source_id'] . '" class="form-delete-label"" data-id="' . $value['source_id'] . '" onClick="return window.confirm(\'Вы действительно хотите удалить источник?\');" title="Удалить"><i class="fas fa-ban fa-sm" style="color: red"></i></a>
                                                    </span>
                                                </div>
                                            </li>'
                        );
                        $i++;
                    }
                }
                ?>
            </ul>
        </div>
    </article>
</div>
</body>
</html>