<?php

class Admin
{
	private $login;
	private $password;

	public function __construct(string $login, string $password)
	{
		$this->login = $login;
		$this->password = $password;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function setLogin(string $login)
	{
		$this->login = $login;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword(string $password)
	{
		$this->password = $password;
	}
}