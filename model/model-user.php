<?php

class UserData
{

	public static function getUserRecords($email)
	{
		$sql = "
			SELECT 
				`id`, `first_name`, `last_name`, `email` 
			FROM `user_table` 
			WHERE `email` = :email;
		";
		$bind_values = array("email" => $email);
	    $stmt = HelperData::runReadQuery($sql, $bind_values);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	public static function getUserCol($column, $where, $data)
	{
		$sql = "SELECT `$column` FROM `user_table` WHERE `$where` = :data";
		$bind_values = array("data" => $data);
	    $stmt = HelperData::runReadQuery($sql, $bind_values);
		$result = $stmt->fetchColumn();
	    return $result;
	}

	public static function saveNewUser($data)
	{
		$sql = "
			INSERT INTO user_table 
				(`first_name`, `last_name`, `email`, `password`) 
			VALUES 
				(:first_name, :last_name, :email, :password);
		";    
		$bind_values = array(
			"first_name" => $data["first_name"],
			"last_name" => $data["last_name"],
			"email" => $data["email"],
			"password" => $data["password"]
		);

		return HelperData::runCreateQuery($sql, $bind_values);
	}

}

	
