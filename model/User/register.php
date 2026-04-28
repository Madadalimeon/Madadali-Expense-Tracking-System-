<?php
include __DIR__ . "/../../config/Database.php";
class register
{
    private $conn;
    function __construct()
    {
        $database = new Database;
        $database->Database();
    }
    public function RegisterQuery($email, $passwordHash)
    {
        $Query = "INSERT INTO users_tb(email, password) VALUES('$email', '$passwordHash')";
        $result = mysqli_query($this->conn, $Query);
        return $result;
    }
}
