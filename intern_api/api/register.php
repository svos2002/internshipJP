<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$register = new Login($db);

$data = json_decode(file_get_contents("php://input"));

$register->email = $data->email;
$register->password = $data->password;
$register->name = $data->name;
$register->gender = $data->gender;
$register->age = $data->age;
$register->country = $data->country;
$register->phone_number = $data->phone_number;

$res = $register->register();

http_response_code($res['status']);
echo json_encode(array('message' => $res));