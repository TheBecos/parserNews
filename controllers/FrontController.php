<?php

class FrontController
{
    function __construct()
    {
        session_start();
        $listAction_Admin = array('logout', 'deleteSource', 'addSource', 'editSource', 'parseNewsSource', 'pageAdmin');

        $viewError = array();

        try {
            $a = AdminModel::isAdmin();
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            } else {
                $action = null;
            }

            if (in_array($action, $listAction_Admin)) {
                if ($a == false) {
                    global $rep, $views;
                    require($rep . $views['loginAdmin']);
                } else {
                    $controller = new AdminController();
                }
            } else {
                $controller = new NewsController();
            }
        }
        catch (Exception $e) {
            global $rep, $views;
            $viewError[] = $e->getMessage();
            require($rep . $views['error']);
        }
        exit(0);
    }
}
