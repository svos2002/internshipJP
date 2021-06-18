<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$user = new User($db);
$data = json_decode(file_get_contents("php://input"));

$user->id = isset($data->id) ? $data->id : '';

if ($user->id != '')
{
    if ($user->user_exists())
    {
        $res = $user->read_one();
        if ($res['success'])
        {
            $arr = array(
                'name' => $user->name,
                'email' => $user->email,
                'gender' => $user->gender,
                'age' => $user->age,
                'country' => $user->country,
                'phone_number' => $user->phone_number,
                'message' => $res
            );

            http_response_code($res['status']);
            echo json_encode($arr);
        }
        else
        {
            http_response_code($res['status']);
            echo json_encode(array('message' => $res));
        }
    }
    else
    {
        http_response_code(404);
        echo json_encode(array('message' => array(
            'success' => false,
            'status' => 404,
            'message' => 'No user found.'
        )));
    }
}
else
{
}