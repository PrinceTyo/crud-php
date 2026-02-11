<?php

require_once __DIR__ . '/../routes/Router.php';
require_once __DIR__ . '/../app/Controllers/StudentController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';

Router::add('GET', '/login', AuthController::class, 'index');
Router::add('POST', '/login', AuthController::class, 'login');
Router::add('POST', '/logout', AuthController::class, 'logout');

Router::add('GET', '/students', StudentController::class, 'index');
Router::add('GET', '/students/create', StudentController::class, 'create');
Router::add('POST', '/students', StudentController::class, 'store');
Router::add('GET', '/students/{id}/edit', StudentController::class, 'edit');
Router::add('POST', '/students/{id}/update', StudentController::class, 'update');
Router::add('POST', '/students/{id}/delete', StudentController::class, 'destroy');

Router::run();
