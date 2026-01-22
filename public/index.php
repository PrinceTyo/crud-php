<?php

require_once __DIR__ . '/../routes/Router.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello', HomeController::class, 'hello');
Router::add('GET', '/world', HomeController::class, 'world');
Router::add('GET', '/about', HomeController::class, 'about');

Router::run();
