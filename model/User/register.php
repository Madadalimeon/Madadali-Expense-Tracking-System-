<?php
include __DIR__ . "/../../config/Database.php";
class register
{
    private $conn;
    function __construct()
    {
        $database = new Database;
        $this->conn = $database->Database();
    }
    public function RegisterQuery($email, $passwordHash)
    {
        $Query = "INSERT INTO users_tb(email, password) VALUES('$email', '$passwordHash')";
        $result = mysqli_query($this->conn, $Query);
        if ($result) {
            echo json_encode([
                "status" => "success",
                "message" => "User registered successfully",
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to register user",
            ]);
        }
    }
}
