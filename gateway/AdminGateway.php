<?php

class AdminGateway
{
	private $con;

	public function __construct(Connection $con)
	{
		$this->con = $con;
	}

	public function checkAdmin(string $login, string $password)
	{
		try {
			$query = "SELECT * FROM admin WHERE login=:id";
			$this->con->executeQuery($query, array(':id' => array($login, PDO::PARAM_STR)));
			$res = $this->con->getResults();
			if (!empty($res)) {
				if (isset($res) && password_verify($password, $res[0]['password'])) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		catch (PDOException $e) {
			$this->myError($e);
		}
	}

	private function myError(PDOException $e)
	{
		global $rep, $views;
		$viewError[] = $e->getMessage();
		throw new Exception("DataBase error");
	}
}
