<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once('../core/initialize.php');
use \Firebase\JWT\JWT;

$data = json_decode(file_get_contents("php://input"));

$login = new Login($db);

$login->email = isset($data->email) ? $data->email : '';
$login->in_pass = isset($data->password) ? $data->password : '';

if ($login->email == '' || $login->in_pass == '')
{
    $msg = Login::msg(false, 406, 'Missing data');

    http_response_code($msg['status']);
    echo json_encode(array('message' => $msg));
}
else
{
    if ($login->email_exists()) {
        $token = $login->generate_JWT();

        http_response_code($token['message']['status']);
        echo json_encode(array($token));
    }
    else
    {
        http_response_code(401);
        echo json_encode(Login::msg(false, 401, 'Login failed.'));
    }
}