<?php

require_once __DIR__ . '/../Core/Session.php';

class AuthMiddleware
{
    public static function handle(): void
    {
        Session::start();

        if (!isset($_SESSION['auth'])) {
            header('Location: /login');
            exit;
        }
    }
}
