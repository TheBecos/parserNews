<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Новости</title>
    <?php require(__DIR__ . "/../pages/head.php") ?>
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <h1 class="col-lg-9 offset-lg-1">Новости</h1>
        <a href="?action=pageAdmin" class="col-lg-2 btn btn-warning btn-lg" role="button"">Панель
        администратора</a>
    </header>
    <article class="row">
        <div class="col-lg-4 offset-lg-1">
            <form method="get" action="" name="pageForm" id="pageForm">
                <div class="form-group">
                    <label>Кол-во новостей на странице:</label>
                    <select name="perpage" class="" onchange="$('#pageForm').submit()">
                        <?php
                        $cnt_news = array(5, 10, 20, 30);
                        foreach ($cnt_news as $cnt) {
                            echo '<option value="' . $cnt . '" ' . ($nbNewsPerPage == $cnt ? 'selected' : '') . '> ' . $cnt . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </form>
        </div>
        <ul class="list-group col-lg-10 offset-lg-1">
            <?php
            if (!isset($listNews)) {
                echo('<p class="alert bg-dark text-white">Нет новостей</p>');
            } else {
                foreach ($listNews as $value) {
                    echo('<li class="list-group-item">'
                        . date('d.m.Y', strtotime($value->getDate())) . '<br>
                            <span class="title font-weight-bold">' . $value->getTitle() . '</span>
                            <span class="badge badge-info tagBadge">' . $value->getTag() . '</span><br>
                            <div class="row">
                                <div class="col-lg-3">' . base64_decode($value->getImage()) . '</div>
                                <div class="col-lg-9">' . $value->getDescription() . '</div>
                            </div>
                            <br>
                            <a href="' . $value->getURL() . '" class="col-lg-2 btn btn-secondary" role="button" target="_blank">Подробнее</a>
                            <span class="pull-right text-muted">Источник: ' . $value->getSourceName() . '</span>
                        </li>');
                }
            }
            ?>
        </ul>
    </article>
    <footer class="row align-bottom">
        <?php
        if (isset($listNews)) {
            if (isset($nbPages) && $nbPages > 1) {
                ?>
                <nav class="mx-auto">
                    <ul class="pagination">
                        <?php
                        if ($page > 1) {
                            $pagePrev = $page - 1;
                            echo("<li class='page-item'><a class='page-link bg-primary text-white' href='?page=$pagePrev'> < </a></li>");
                        }
                        echo "<li class='page-item " . (($page == 1) ? "active" : "") . "'><a class='page-link' href='?page=1'>1</a></li>";
                        if ($page > 3)
                            echo "<li class='page-item'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                        for ($i = 2; $i <= $nbPages; $i++) {
                            if ($i <= $page + 2 && $i >= $page - 1)
                                echo "<li class='page-item " . (($page == $i) ? "active" : "") . "'><a class='page-link' href='?page=$i'> $i </a></li>";
                        }
                        if ($page < $nbPages) {
                            $pageNext = $page + 1;
                            echo("<li class='page-item'><a class='page-link bg-primary text-white' href='?page=$pageNext'> > </a></li>");
                        }
                        ?>
                    </ul>
                </nav>
                <?php
            }
        }
        ?>
    </footer>
</div>
</body>
</html>