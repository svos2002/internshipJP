<?php
spl_autoload_register(function ($class_name) {
    require_once(CORE_PATH.DS.$class_name.'.php');
});



class Login extends Object_parent
{
    private $login_table;

    public $password;
    public $in_pass;
    public $auth_number;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->login_table = 'login';
    }

    function email_exists()
    {
        $query = "SELECT *
            FROM " . $this->login_table . "
            WHERE email = :email
            LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $this->email=htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->password = $row['password'];

            return true;
        }
        return false;
    }

    public function generate_JWT()
    {
        $this->in_pass = htmlspecialchars(strip_tags($this->in_pass));

        if(password_verify($this->in_pass, $this->password)){

            $token = array(
                "iat" => $issued_at,
                "exp" => $expiration_time,
                "iss" => $issuer,
                "data" => array(
                    "id" => $this->id,
                    "email" => $this->email,
                    "auth_number" => $this->auth_number
                )
            );

            $jwt = JWT::encode($token, $key);
            $msg = self::msg(true, 200, 'Successful login.');

            return array('message' => $msg, 'jwt' => $jwt);
        }

        return self::msg(false, 401, 'Login failed.');
    }

    public function register()
    {
        if ($this->reg_info())
        {
            if ($this->reg_login($this->conn->lastInsertId())) return self::msg(true, 201, 'User has been created.');

            $query = 'DELETE FROM ' . $this->info_table . ' WHERE email = :email';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', htmlspecialchars(strip_tags($this->email)));
            $stmt->execute();

            return self::msg(false, 500, 'Something went wrong with the creation of the user.');
        }
        return self::msg(false, 500, 'Something went wrong with the creation of the user.');
    }

    private function reg_info()
    {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->country = htmlspecialchars(strip_tags($this->country));
        $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));

        $query = 'INSERT INTO ' . $this->info_table . ' SET 
        name = :name,
        email = :email,
        gender = :gender,
        age = :age,
        country = :country,
        phone_number = :phone_number';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':age', intval($this->age));
        $stmt->bindParam(':country', $this->country);
        $stmt->bindParam(':phone_number', $this->phone_number);

        if($stmt->execute()) return true;
        return false;
    }

    private function reg_login($id)
    {
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $hash = password_hash($this->password, PASSWORD_DEFAULT);

        $query = 'INSERT INTO ' . $this->login_table . ' SET email = :email, password = :password, id = :id, auth_number = :auth_number';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hash);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':auth_number', 1);

        if($stmt->execute()) return true;
        return false;
    }
}