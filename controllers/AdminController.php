<?php

class AdminController
{
    function __construct()
    {
        $viewError = array();

        try {
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            } else {
                $action = null;
            }

            switch ($action) {
                case null:
                case 'pageAdmin':
                    $this->pageMain();
                    break;
                case 'login':
                    $this->pageLogin();
                    break;
                case 'logout':
                    $this->logout();
                    break;
                case 'addSource':
                case 'editSource':
                    $this->addSource();
                    break;
                case 'deleteSource':
                    $this->deleteSource();
                    break;
                case 'initial':
                    $this->parseNewsSources();
                    break;
                case 'sync':
                    $this->parseNewsSources(14);
                    break;
                case 'clearing':
                    $this->clearing();
                    break;
                default:
                    global $rep, $views;
                    $viewError[] = "Action non defined!";
                    require($rep . $views['error']);
                    break;
            }
        }
        catch (Exception $e) {
            global $rep, $views;
            $viewError[] = $e->getMessage();
            require($rep . $views['error']);
        }
        exit(0);
    }

    private function pageMain()
    {
        global $rep, $views;
        $adminMod = new AdminModel();
        $listSource = $adminMod->viewSource();
        $newsMod = new NewsModel();
        $countNews = $newsMod->countNews();
        require($rep . $views['viewAdmin']);
    }

    private function pageLogin()
    {
        global $rep, $views;
        echo('<p class="alert alert-info">good</p>');
        require($rep . $views['loginAdmin']);
    }

    private function addSource()
    {
        global $rep, $views;

        if (!empty($_GET['source_id'])) {
            $sourceMod = new SourceModel();
            $source = $sourceMod->editSource($_GET['source_id']);
            if (empty($source)) {
                $viewError[] = "Источник не найден";
                require($rep . $views['error']);
                return;
            }
        }

        if (!empty($_POST)) {
            $address = Validation::clearString($_POST['url']);
            $address = Validation::validateURL($address);
            $name = Validation::clearString($_POST['name']);
            if ($address && $name) {
                $code = $_POST['code'];
                $adminMod = new AdminModel();
                if (!empty($_POST['source_id']) || Validation::sourceExist($address) == 0) {
                    $source = [
                        'name'    => $name,
                        'address' => $address,
                        'code'    => base64_encode($code)
                    ];

                    if (!empty($_POST['source_id'])) {
                        $adminMod->updateSource($_POST['source_id'], $source);
                    } else {
                        $adminMod->addSource($source);
                    }
                    $listSource = $adminMod->viewSource();
                    header('Location: index.php?action=pageAdmin');
                } else {
                    $viewError[] = "Подключение уже установлено";
                    require($rep . $views['error']);
                }
            } else {
                $viewError[] = "Неверный формат ссылки <br>Пример допустимого формата : <br />http://example.com <br /> https://example_n2.org";
                require($rep . $views['error']);
            }
            //$this->pageMain();
        } else {
            require($rep . $views['sourceCreate']);
        }

    }

    private function logout()
    {
        global $rep, $views;
        $adminMod = new AdminModel();
        $adminMod->logout();
        require($rep . $views['loginAdmin']);
    }

    private function deleteSource()
    {
        $adminMod = new AdminModel();
        if (!empty($_GET['source_id'])) {
            $adminMod->deleteSource($_GET['source_id']);
        }
        header('Location: index.php?action=pageAdmin');
    }

    private function parseNewsSources($period_days = 365)
    {
        $adminMod = new AdminModel();

        include './libs/phpQuery.php';

        $sources = $adminMod->viewSource();

        global $database, $db_login, $db_password;

        if (!empty($sources)) {
            foreach ($sources as $source) {
                $url = $source['address'];
                $code = base64_decode($source['parser_code']);
                $opts = array(
                    'http' => array(
                        'method' => "GET",
                        'header' => "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64)\r\n"
                    )
                );
                $context = stream_context_create($opts);
                $html = file_get_contents($url, false, $context);

                $result = eval($code);

                if (!empty($result)) {
                    $date = strtotime('-' . $period_days . 'day');
                    foreach ($result as $record) {
                        if (strtotime($record['date']) >= $date) {
                            $new = new News($source['source_id'], $record['url'], $record['title'], $record['description'], $record['tag'], $record['image'], $record['date']);
                            $gw = new NewsGateway(new Connection($database, $db_login, $db_password));
                            $gw->addNew($new);
                        }
                    }
                }
            }
        }

        $listSource = $adminMod->viewSource();
        header('Location: index.php?action=pageAdmin');
    }

    private function clearing()
    {
        global $database, $db_login, $db_password;
        $gw = new NewsGateway(new Connection($database, $db_login, $db_password));
        $gw->deleteAllNews();
        header('Location: index.php?action=pageAdmin');
    }

}