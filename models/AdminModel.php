<?php

class AdminModel
{
    public static function logout()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            return true;
        } else
            return false;
    }

    public static function login($login, $password)
    {
        global $server, $db_login, $db_password;
        $gw = new AdminGateway(new Connection($server, $db_login, $db_password));
        $verif = $gw->checkAdmin($login, $password);
        if ($verif) {
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
            return new Admin($login, $password);
        } else {
            return null;
        }
    }

    public function addSource(array $source)
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        $gw->addSource($source);
    }
    public function updateSource(int $id, array $source)
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        $gw->updateSource($id, $source);
    }

    public function viewSource()
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        return $gw->viewSource();
    }

    public function editSource(int $source_id)
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        $gw->editSource($source_id);
    }

    public function deleteSource(int $source_id)
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        $gw->deleteSource($source_id);
        return $gw->viewSource();
    }
}
