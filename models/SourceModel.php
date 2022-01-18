<?php

class SourceModel
{
    public function viewSource()
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        return $gw->viewSource();
    }

    public function editSource(int $id)
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        return $gw->editSource($id);
    }

    public function clearDatabase()
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        $gw->clearDatabase();
    }
}
