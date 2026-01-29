<?php

require_once __DIR__ . '/../routes/Router.php';
require_once __DIR__ . '/../app/Controllers/StudentController.php';

Router::add('GET', '/students', StudentController::class, 'index');
Router::add('GET', '/students/create', StudentController::class, 'create');
Router::add('POST', '/students', StudentController::class, 'store');
Router::add('GET', '/students/{id}/edit', StudentController::class, 'edit');
Router::add('POST', '/students/{id}/update', StudentController::class, 'update');
Router::add('POST', '/students/{id}/delete', StudentController::class, 'destroy');

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])) {
//     $_SERVER['REQUEST_METHOD'] = strtoupper($_POST['_method']);
// }

Router::run();
