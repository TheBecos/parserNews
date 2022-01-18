<?php

class ValidationModel
{
	public static function urlExist(string $url): int
	{
		return ValidationGateway::urlExist($url);
	}

	public static function sourceExist(string $address): bool
	{
		return ValidationGateway::sourceExist($address);
	}
}