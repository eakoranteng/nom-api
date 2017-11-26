<?php 

class HelperLogic
{

	public static function validateEmail($email)
	{
		filter_var($email, FILTER_SANITIZE_EMAIL);
		return ( filter_var($email, FILTER_VALIDATE_EMAIL) ) ? true : false;
	}

	public static function validatePassword($password)
	{
		$pass_regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,}$/';
		return ( preg_match($pass_regex, $password) ) ? true : false;
	}

	public static function setResponse($message_code, $data=null)
	{
		return array(
			"message" => $message_code,
			"data" => $data
		);
	}

}
