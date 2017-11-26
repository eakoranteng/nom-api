<?php 

class HelperData
{

	public static function runReadQuery($sql, array $bind_values=null) {
		global $conn;
		if ( !is_null($bind_values) ) {
			$stmt = $conn->prepare($sql);
			foreach ($bind_values as $param => $val) {
				if ( is_int($val) ) {
					$stmt->bindValue($param, $val, PDO::PARAM_INT);
				} else {
					$stmt->bindValue($param, $val);
				}
			}
			$stmt->execute();
			return $stmt;
		} else {
			$stmt->query($sql);
			return $stmt;
		}
	}

	public static function runCreateQuery($sql, array $bind_values=null) {
		global $conn;
		if ( !is_null($bind_values) ) {
			try {
				$stmt = $conn->prepare($sql);
				foreach ($bind_values as $param => $val) {
					if ( is_int($val) ) {
						$stmt->bindValue($param, $val, PDO::PARAM_INT);
					} else {
						$stmt->bindValue($param, $val);
					}
				}
				$stmt->execute();
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
		else {
			try {
				$stmt->query($sql);
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}
	}	

}
