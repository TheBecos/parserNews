<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Источники - <?=(!empty($source['source_id']) ? 'Редактирование':'Добавление')?> источника</title>
    <?php require(__DIR__ . "/../pages/head.php") ?>
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <h1 class="col-lg-9 offset-lg-1"><?=(!empty($source['source_id']) ? 'Редактирование':'Добавление')?> источника</h1>
        <a href="?action=pageAdmin" class="col-lg-1 btn btn-dark btn-lg" role="button"
           aria-pressed="true">Назад</a>
    </header>
    <form method="post" name="sourceForm" id="sourceForm" action="index.php?action=addSource"
          class="col-lg-10 offset-lg-1 bg-dark text-white articleAdmin rounded">
        <input type="hidden" name="source_id"
               value="<?php echo (!empty($source['source_id']) ? $source['source_id'] : ''); ?>">
        <div class="row">
            <div class="col-lg-4">
                <label>Название</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="name"
                           value="<?= !empty($source['name']) ? $source['name'] : '' ?>" required>
                </div>
                <label>URL</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="url"
                           value="<?= isset($source['address']) ? $source['address'] : '' ?>" required>
                </div>
            </div>
            <div class="col-lg-8">
                <label>Код парсера</label>
                <div class="form-group">
                    <textarea class="form-control bg-dark text-white" type="text" name="code" id="code" rows="70"><?= isset($source['parser_code']) ? base64_decode($source['parser_code']) : '' ?></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <input type="submit" class="btn btn-success" value="Сохранить"/>
            </div>
        </div>
    </form>
</div>
<script>
    let parserCode = CodeMirror.fromTextArea(document.getElementById('code'), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php-open",
        indentUnit: 4,
        indentWithTabs: true
    });
</script>
</body>
</html>