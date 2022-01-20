<?php

class NewsController
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
                    $this->pageMain();
                    break;
                case "login":
                    $this->login();
                    break;
                default:
                    global $rep, $views;
                    $viewError[] = "Action not defined!";
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
        $m = new NewsModel();
        if (isset($_GET['perpage'])) {
            setcookie('perpage', $_GET['perpage']);
            $_COOKIE['perpage'] = $_GET['perpage'];
        }
        $nbNewsPerPage = isset($_COOKIE['perpage']) ? $_COOKIE['perpage'] : 10;
        $nbTotalNews = $m->countNews();

        $nbPages = Validation::nbPage($nbTotalNews, $nbNewsPerPage);
        $page = Validation::pagination($nbNewsPerPage, $nbTotalNews);

        $premierNews = $m->nbNewsPerPage($page, $nbNewsPerPage);
        $listNews = $m->viewNewsPerPage($premierNews, $nbNewsPerPage);

        require($rep . $views['viewNews']);
    }

    private function login()
    {
        global $rep, $views;
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = Validation::clearString($_POST['login']);
            $password = Validation::clearString($_POST['password']);
            $admin = AdminModel::login($login, $password);
            if ($admin == null) {
                require($rep . $views['loginAdmin']);
            } else {
                $adminMod = new AdminModel();
                $listSource = $adminMod->viewSource();
                require($rep . $views['viewAdmin']);
            }
        } else {
            require($rep . $views['loginAdmin']);
        }
    }
}
