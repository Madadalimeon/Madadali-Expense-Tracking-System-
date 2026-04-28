<?php
require_once __DIR__ . "/../../model/User/Register.php";

class UserController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);            
            if (empty($email) || empty($password)) {
                echo "Email and password are required.";
                return;
            }            
            $register = new Register();
            $result = $register->RegisterQuery($email, $passwordHash);

            if ($result) {
                echo "User registered successfully!";
            } else {
                echo "Registration failed!";
            }
        }
    }
}