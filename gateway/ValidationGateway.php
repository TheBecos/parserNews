<?php

class ValidationGateway
{
	public static function urlExist(string $url): int
	{
		global $database, $db_login, $db_password;
		$con = new Connection($database, $db_login, $db_password);
		$codeSQL = "SELECT COUNT(*) FROM news WHERE url=:url";
		$con->executeQuery('SELECT COUNT(*) FROM news WHERE url=:url', array('url' => array($url, PDO::PARAM_STR)));
		$resultat = $con->getResults();
		return $resultat[0][0];
	}

	public static function sourceExist(string $address): bool
	{
		global $database, $db_login, $db_password;
		$con = new Connection($database, $db_login, $db_password);
		$codeSQL = "SELECT COUNT(*) FROM sources WHERE address=:addr";
		$con->executeQuery($codeSQL, array('addr' => array($address, PDO::PARAM_STR)));
		$result = $con->getResults();
		return $result[0][0];
	}
}