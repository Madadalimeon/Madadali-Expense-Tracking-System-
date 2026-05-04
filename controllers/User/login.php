<?php
include __DIR__ . "/../../model/User/login.php";
class loginController
{
    public function login()
    {
        if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]) {
            print_r($_POST);
            $email = $_POST["email"] ?? "";
            $password = $_POST["password"] ?? "";
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $loginQuery = new LoginModel;
            $result = $loginQuery->loginQuery($email,$passwordhash);
        }
    }
}

$Controller = new loginController;
$Controller->login();
