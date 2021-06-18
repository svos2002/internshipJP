<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$user = new User($db);
$data = json_decode(file_get_contents("php://input"));

$user->find = isset($data->find)? $data->find : '';

if ($user->find != '')
{
    $result = $user->search();
    $num = $result->rowCount();

    if ($num > 0)
    {
        $arr = array();
        $arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $user_item = array(
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'age' => $age,
                'country' => $country,
                'phone_number' => $phone_number
            );
            array_push($arr['data'], $user_item);
        }

        $arr['message'] = array(
            'success' => true,
            'status' => 200,
            'message' => 'Users gathered.');

        http_response_code($arr['message']['status']);
        echo json_encode($arr);
    }
    else
    {
        http_response_code(404);
        echo json_encode(array('message' => array(
            'success' => false,
            'status' => 404,
            'message' => 'No users found.'
        )));
    }
}
else
{
    $result = $user->read_all();
    $num = $result->rowCount();

    if ($num > 0)
    {
        $arr = array();
        $arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $user_item = array(
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'age' => $age,
                'country' => $country,
                'phone_number' => $phone
            );
            array_push($arr['data'], $user_item);
        }

        $arr['message'] = array(
            'success' => true,
            'status' => 200,
            'message' => 'Users gathered.');

        http_response_code($arr['message']['status']);
        echo json_encode($arr);
    }
    else
    {
        http_response_code(404);
        echo json_encode(array('message' => array(
            'success' => false,
            'status' => 404,
            'message' => 'No users found.'
        )));
    }
}