<?php
namespace App\Controllers;

class AuthController {
     public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $model = new UserModel();
        $user = $model->getByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            echo "Login successful.";
        } else {
            echo "Invalid credentials.";
        }
    }

    public function register() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $model = new UserModel();
        $model->create($name, $email, $password);

        echo "User registered.";
    }
}
