<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once('../core/initialize.php');
use \Firebase\JWT\JWT;

$data = json_decode(file_get_contents("php://input"));

$jwt=isset($data->jwt) ? $data->jwt : '';

if($jwt)
{
    try
    {
        $decoded = JWT::decode($jwt, $key, array('HS256'));

        $user = new User($db);

        $user->id = $decoded->data->id;

        if ($user->user_exists())
        {
            $user->name = $data->name;
            $user->gender = $data->gender;
            $user->age = $data->age;
            $user->country = $data->country;
            $user->phone_number = $data->phone_number;

            $res = $user->update();

            http_response_code($res['status']);
            echo json_encode($res);
        }
        else
        {
            $msg = Object_parent::msg(false, 404, 'No user found.');

            http_response_code($msg['status']);
            echo json_encode(array('message' => $msg));
        }
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