<?php

class User
{
    private static array $user = [
        'id' => 1,
        'username' => 'PrinceTyo',
        'password' => 'Mahal123'
    ];

    public static function attempt(string $username, string $password): ?array
    {
        if (self::$user['username'] === $username && self::$user['password'] === $password) {
            return self::$user;
        }

        return null;
    }
}
