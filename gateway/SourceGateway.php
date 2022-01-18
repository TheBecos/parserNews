<?php

class SourceGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function addSource(array $source)
    {
        try {
            $query = "INSERT INTO sources(name, address, parser_code) VALUES (:name, :address, :code)";
            $this->con->executeQuery($query, array('name' => array($source['name'], PDO::PARAM_STR), 'address' => array($source['address'], PDO::PARAM_STR), 'code' => array($source['code'], PDO::PARAM_STR)));
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    public function updateSource(int $source_id, array $source)
    {
        try {
            $query = "UPDATE sources SET name=:name, address=:address, parser_code=:code WHERE source_id=:id";
            $this->con->executeQuery($query, array('name' => array($source['name'], PDO::PARAM_STR), 'address' => array($source['address'], PDO::PARAM_STR), 'code' => array($source['code'], PDO::PARAM_STR), 'id' => array($source_id, PDO::PARAM_STR)));
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    public function viewSource()
    {
        try {
            $codeSQL = "SELECT * FROM sources";
            $this->con->executeQuery($codeSQL, array());
            $result = $this->con->getResults();
            return $result;
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    public function editSource(int $id)
    {
        try {
            $codeSQL = "SELECT * FROM sources WHERE source_id = :id";
            $this->con->executeQuery($codeSQL, array("id" => array($id, PDO::PARAM_STR)));
            $result = $this->con->getResult();
            return $result;
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    public function deleteSource($source_id)
    {
        try {
            $codeSQL = "DELETE FROM sources WHERE source_id = :id";
            $this->con->executeQuery($codeSQL, array('id' => array($source_id, PDO::PARAM_STR)));
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    public function clearDatabase()
    {
        try {
            $codeSQL = "DELETE FROM news WHERE date_pub < NOW() - INTERVAL 2 WEEK";
            $this->con->executeQuery($codeSQL, array());
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    private function myError(PDOException $e)
    {
        $viewError[] = $e->getMessage();
        throw new Exception("DataBase error: " . $e->getMessage());
    }
}