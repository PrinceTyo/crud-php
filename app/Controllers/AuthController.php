<?php

require_once __DIR__ . '/../Models/User.php';

class AuthController
{
    public function index(): void
    {
        Session::start();
        require __DIR__ . '/../Views/Auth/login.php';
    }

    public function login(): void
    {
        Session::start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::attempt($username, $password);

        if (!$user) {
            $_SESSION['error'] = "Username atau password salah";
            header('Location: /login');
            exit;
        }

        $_SESSION['auth'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];

        header('Location: /students');
        exit;
    }

    public function logout(): void
    {
        Session::start();

        unset($_SESSION['auth']);

        header('Location: /login');
        exit;
    }
}
