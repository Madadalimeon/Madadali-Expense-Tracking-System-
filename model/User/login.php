<?php

include __DIR__ . "/../../config/Database.php";
require 'vendor/autoload.php';
use \Firebase\JWT\JWT;
class LoginModel
{
    public $conn;
    public function __construct()
    {
        $database = new Database;
        $this->conn = $database->Database();
    }
    public function loginQuery($email, $password)
    {
        $sql = "SELECT * FROM users_tb WHERE email ='$email'";
        $Result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($Result) == 1) {
            while ($row = mysqli_fetch_assoc($Result)) {
                if (password_verify($password, $row['password'])) {
                    $this->jwt_token($row['id'], $row['email']);
                } else {
                    echo json_encode(array("message" => "Invalid Password"));
                }
            }
        }
    }

    public function jwt_token($user_id, $email) 
    {
        $key = "your_secret_key";
        $patload =[
            "iss" => "http://localhost/",
            "aud" => "http://localhost/",
            "iat" => time(),
            "nbf" => time(),
            "exp" => time() + 3600,
            "data" => [
                "user_id" => $user_id,
                "email" => $email
            ],
        ];
        $jwt = JWT::encode($patload, $key, 'HS256');
        echo json_encode(array("message" => "Login successful", "token" => $jwt));
    }
}
