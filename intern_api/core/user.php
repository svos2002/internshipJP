<?php
spl_autoload_register(function ($class_name) {
    require_once(CORE_PATH.DS.$class_name.'.php');
});

class User extends Object_parent
{
    public $find;

    public function __construct($db)
    {
        parent::__construct($db);
    }

    /**
     * Summary: It searches the database for the specific id.
     *          It will return the row count which acts like a boolean.
     *
     * @return bool
     */
    public function user_exists()
    {
        $query = 'SELECT * FROM ' . $this->info_table . ' WHERE id = :id LIMIT 1';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) return $stmt->rowCount();
        return false;
    }

    /**
     * Summary: It will retrieve all entries from the database.
     *
     * @return stmt
     */
    public function read_all()
    {
        $query = 'SELECT * FROM ' . $this->info_table . ' ORDER BY id ASC';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function search()
    {
        $query = 'SELECT * FROM ' . $this->info_table . ' LIKE name = :name';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', '%' . $this->find . '%');

        $stmt->execute();

        return $stmt;
    }

    /**
     * Summary: It will retrieve all information of one user which id was given.
     *
     */
    public function read_one()
    {
        $query = 'SELECT * FROM ' . $this->info_table . ' WHERE id = :id LIMIT 1';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute())
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (empty($row)) return self::msg(false, 404, 'No user found.');

            $this->email = $row['email'];
            $this->name = $row['name'];
            $this->gender = $row['gender'];
            $this->age = $row['age'];
            $this->country = $row['country'];
            $this->phone_number = $row['phone'];

            return self::msg(true, 200, 'User information gotten.');
        }

        return self::msg(false, 500, 'Something went wrong while getting the information.');
    }

    /**
     * Summary: Updates the information of the user with that id.
     */
    public function update()
    {
        $query = 'UPDATE ' . $this->info_table . ' SET 
                    name = :name,
                    gender = :gender,
                    age = :age,
                    country = :country,
                    phone_number = :phone_number
                  WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->country = htmlspecialchars(strip_tags($this->country));
        $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':age', intval($this->age));
        $stmt->bindParam(':country', $this->country);
        $stmt->bindParam(':phone_number', $this->phone_number);
        $stmt->bindParam(':id', intval($this->id));

        if($stmt->execute()) return self::msg(true, 200, 'Successfully updated the user.');
        return self::msg(false, 500, 'Something went wrong with updating the user.');
    }

    /**
     * Summary: This will delete the user from both the intern table and the login table.
     */
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->info_table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $this->id = intval($this->id);
        $stmt->bindParam(':id', $this->id);

        if(!$stmt->execute()) return self::msg(false, 500, 'Something went wrong with deleting the data.');

        $query = 'DELETE FROM ' . $this->login_table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $this->id = intval($this->id);
        $stmt->bindParam(':id', $this->id);

        if(!$stmt->execute()) return self::msg(false, 500, 'Something went wrong with deleting the data.');
        return self::msg(true, 200, 'Successfully deleted user.');
    }
}
