<?php 

class UserLogic 
{

	public static function verifyUser($data) 
	{
		$db_password = UserData::getUserCol( "password", "email", $data["email"] );
		if ($db_password) {
			if ( password_verify($data["password"], $db_password) ) {
				$user_records = UserData::getUserRecords( $data["email"] );
				return HelperLogic::setResponse(2002, $user_records);
			} else {
				return HelperLogic::setResponse(4005);
			}
		} else {
			return HelperLogic::setResponse(1001);
		}
	}

	public static function registerUser($data)
	{
		$is_valid_email = HelperLogic::validateEmail($data["email"]);
		$is_valid_password = HelperLogic::validatePassword($data["password"]);

		if ($is_valid_email && $is_valid_password) {
			$user_exist = UserData::getUserCol( "id", "email", $data["email"] );
			if (!$user_exist) {
				$hashed_password = password_hash($data["password"], PASSWORD_DEFAULT);
				$data["password"] = $hashed_password;
				UserData::saveNewUser($data);
				return HelperLogic::setResponse(2001);
			} else {
				return HelperLogic::setResponse(1002);
			}

		} 
		elseif ( !$is_valid_email && $is_valid_password ) {
			return HelperLogic::setResponse(4001);
		}
		elseif ( $is_valid_email && !$is_valid_password ) {
			return HelperLogic::setResponse(4002);
		}
		else {
			return HelperLogic::setResponse(4003);
		}
	}

}
