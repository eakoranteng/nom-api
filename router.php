<?php 

function sendResponse($http_code, $ctrl_response)
{
    $client_message = CLIENT_MESSAGE[$ctrl_response["message"]];
    $response["message"] = $client_message;
    if ( !is_null($ctrl_response["data"]) ) $response["data"] = $ctrl_response["data"];

    http_response_code($http_code);
    echo json_encode($response);
}
