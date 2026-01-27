<?php

require_once __DIR__ . '/../routes/Router.php';
require_once __DIR__ . '/../app/Controllers/StudentController.php';

Router::add('GET', '/students', StudentController::class, 'index');
Router::add('GET', '/students/create', StudentController::class, 'create');
Router::add('POST', '/students', StudentController::class, 'store');
Router::add('GET', '/students/{student}/edit', StudentController::class, 'edit');
Router::add('PUT', '/students/{student}', StudentController::class, 'update');
Router::add('DELETE', '/students/{student}', StudentController::class, 'destroy');

Router::run();
