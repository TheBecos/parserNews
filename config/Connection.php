<?php

class Connection extends PDO
{
	private $stmt;

	public function __construct($server, $login, $password)
	{
		parent::__construct("mysql:host=$server;dbname=parser;charset=UTF8", $login, $password);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function executeQuery($codeSQL, array $param = [])
	{
		$this->stmt = parent::prepare($codeSQL);
		foreach ($param as $name => $value) {
			$this->stmt->bindValue($name, $value[0], $value[1]);
		}
		return $this->stmt->execute();
	}

	public function getResults()
	{
		return $this->stmt->fetchall();
	}
    public function getResult()
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
