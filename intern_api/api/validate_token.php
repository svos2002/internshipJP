<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include_once('../core/initialize.php');
use \Firebase\JWT\JWT;

$data = json_decode(file_get_contents('php://input'));

$jwt=isset($data->jwt) ? $data->jwt : '';

if($jwt)
{
    try
    {
        $decoded = JWT::decode($jwt, $key, array('HS256'));

        $msg = Object_parent::msg(true, 200, 'Access granted.');

        http_response_code($msg['status']);
        echo json_encode(array(
            'data' => $decoded->data,
            'message' => $msg
        ));

    }
    catch (Exception $e)
    {
        $msg = Object_parent::msg(false, 401, 'Access denied.');

        http_response_code($msg['status']);
        echo json_encode(array(
            "error" => $e->getMessage(),
            "message" => $msg
        ));
    }
}
else
{
    $msg = Object_parent::msg(false, 401, 'Access denied.');

    http_response_code($msg['status']);
    echo json_encode(array("message" => $msg));
}
?>