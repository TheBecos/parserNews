<?php

class NewsModel
{
	public function viewNews()
	{
		global $server, $db_login, $db_password;
		$newsGateway = new NewsGateway(new Connection($server, $db_login, $db_password));
		return $newsGateway->viewNews();
	}

	public function viewNewsPerPage($debut, $nbNewsPerPage)
	{
		global $server, $db_login, $db_password;
		$newsGateway = new NewsGateway(new Connection($server, $db_login, $db_password));
		return $newsGateway->viewNewsPerPage($debut, $nbNewsPerPage);
	}

	public function nbNewsPerPage(int $page, int $nbDeNewsPerPage)
	{
		global $server, $db_login, $db_password;
		$newsGateway = new NewsGateway(new Connection($server, $db_login, $db_password));
		return $newsGateway->nbNewsPerPage($page, $nbDeNewsPerPage);
	}

	public function countNews()
	{
		global $server, $db_login, $db_password;
		$newsGateway = new NewsGateway(new Connection($server, $db_login, $db_password));
		return $newsGateway->countNews();
	}
}