<?php


class Object_parent
{
    protected $conn;
    protected $info_table;

    public $email;
    public $id;
    public $name;
    public $gender;
    public $age;
    public $country;
    public $phone_number;

    public function __construct($db)
    {
        $this->conn = $db;

        $this->info_table = 'intern';
    }

    static function msg($success,$status,$message){
        return array_merge([
            'success' => $success,
            'status' => $status,
            'message' => $message
        ]);
    }
}