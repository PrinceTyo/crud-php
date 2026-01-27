<?php

class Router
{
    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
        ];
    }

    public static function run(): void
    {
        $path = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        foreach (self::$routes as $route) {

            // potong URL & route jadi array
            $pathParts = explode('/', trim($path, '/'));
            $routeParts = explode('/', trim($route['path'], '/'));

            // jumlah segmen harus sama
            if (count($pathParts) !== count($routeParts)) {
                continue;
            }

            $params = [];
            $match = true;

            foreach ($routeParts as $i => $part) {
                if (preg_match('/^\{.+\}$/', $part)) {
                    // ini parameter {student}
                    $params[] = $pathParts[$i];
                } elseif ($part !== $pathParts[$i]) {
                    $match = false;
                    break;
                }
            }

            if ($match && $method === $route['method']) {
                $controller = new $route['controller'];
                call_user_func_array(
                    [$controller, $route['function']],
                    $params
                );
                return;
            }
        }

        http_response_code(404);
        echo "CONTROLLER NOT FOUND";
    }
}
