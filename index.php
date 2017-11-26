<?php 

include_once 'config.php';
include 'controller/controllers.php';
include 'router.php';

$method = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');

// POST
if ($method == "POST") {
	$input = json_decode(file_get_contents('php://input'),true);
	$action = (int)$input["action"];
	$data = ( isset($input["data"]) ) ? $input["data"] : null ;
	
	switch ($action) {
		case 101: // user login
			$response = UserLogic::verifyUser($data);
			switch ( $response["message"] ) {
				case 1001: // user not found
					sendResponse(404, $response);
					break;
				
				case 4005: // incorrect password
					sendResponse(401, $response);
					break;

				case 2002: // login successful
					sendResponse(200, $response);
					break;
			}
			break;
		
		case 102: // user registration
			$response = UserLogic::registerUser($data);
			switch ( $response["message"] ) {
				case 2001: // registration successful
					sendResponse(201, $response);
					break;
				
				case 4001: // invalid email
					sendResponse(400, $response);
					break;

				case 4002: // invalid password
					sendResponse(400, $response);
					break;

				case 4003: // invalid email and password
					sendResponse(400, $response);
					break;

				case 1002: // user already created
					sendResponse(403, $response);
					break;
			}
			break;

		default:
			$response = HelperLogic::setResponse(5002);
			sendResponse(503, $response);
			break;
	}
}
