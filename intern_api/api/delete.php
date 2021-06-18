<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once('../core/initialize.php');

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id))
{
    $user = new User($db);

    $user->id = $data->id;

    if ($user->user_exists())
    {
        $res = $user->delete();

        http_response_code($res['status']);
        echo json_encode($res);
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
    http_response_code(406);
    echo json_encode(array('message' => array(
        'success' => false,
        'status' => 406,
        'message' => 'No id given.'
    )));
}