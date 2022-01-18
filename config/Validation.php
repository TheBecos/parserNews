<?php

class Validation
{

	public static function clearString(string $channel)
	{
		if (!isset($channel)) return false;
		$data = strip_tags($channel);
		$data = trim($data);
		$data = stripslashes($data);
		return $data;
	}

	public static function validateURL(string $url)
	{
		if (!isset($url)) return false;

		$url = filter_var($url, FILTER_SANITIZE_URL);
		if (filter_var($url, FILTER_VALIDATE_URL)) {
			return $url;
		}

		return false;
	}

	public static function validateEmail(string $email): bool
	{
		if (!isset($email)) return false;

		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public static function urlExist(string $url): int
	{
		return ValidationModel::urlExist($url);
	}

	public static function sourceExist(string $address): bool
	{
		return ValidationModel::sourceExist($address);
	}

	public static function nbPage(int $nbTotalNews, int $nbNewsPerPage)
	{
		return ceil($nbTotalNews / $nbNewsPerPage);
	}

	public static function pagination(int $nbNewsPerPage, int $nbTotalNews)
	{
		$page = (isset($_GET['page'])) ? abs(intval($_GET['page'])) : 1;
		$page = ($page == 0) ? 1 : $page;
		return $page;
	}

	public static function verifityNumber(int $nb)
	{
		$nb = filter_var($nb, FILTER_SANITIZE_NUMBER_INT);
		return filter_var($nb, FILTER_VALIDATE_INT);
	}
}
