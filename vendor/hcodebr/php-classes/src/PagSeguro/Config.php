<?php

namespace Hcode\PagSeguro;

class Config {

	const SANBOX = true;

	const SANDBOX_EMAIL = "amtadei@uol.com.br";
	const PRODUCTION_EMAIL = "amtadei@uol.com.br";

	const SANBOX_TOKEN = "70B93DBAB6804F408B0E19A9D9185A76";
	const PRODUCTION_TOKEN = "bb02971e-c606-4ead-9e5d-2c19fe49a111afb1b0804e65ac59f9ff2281a4b38f6061bf-3c1e-4d4d-b7dd-a53742aa4da0";

	const SANDBOX_SESSIONS = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
	const PRODUCTION_SESSIONS = "https://ws.pagseguro.uol.com.br/v2/sessions";

	public static function getAuthentication():array 
	{
		if (Config::SANBOX === true) 
		{
			return [
				"email"=>Config::SANDBOX_EMAIL,
				"token"=>Config::SANBOX_TOKEN
			];
		} else {
			return [
				"email"=>Config::PRODUCTION_EMAIL,
				"token"=>Config::PRODUCTION_TOKEN
			];
		}

	}

	public static function getUrlSessions():string 
	{

		return (config::SANBOX === true) ? config::SANDBOX_SESSIONS : config::PRODUCTION_SESSIONS;

	}


}

?>




