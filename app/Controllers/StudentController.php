<?php

require_once __DIR__ . '/../Models/Student.php';
require_once __DIR__ . '/../Middlewares/AuthMiddleware.php';

class StudentController
{
    public function index(): void
    {
        AuthMiddleware::handle();
        $students = Student::filter($_GET);
        $avgMapel = Student::averagePerSubject();

        require __DIR__ . '/../Views/Students/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../Views/Students/create.php';
    }

    public function store(): void
    {
        try {
            Student::store($_POST);
            $_SESSION['success'] = 'Created data successfully';
            header('Location: /students');
            exit;
        } catch (Exception $e) {
            $errors = json_decode($e->getMessage(), true);
            $old = $_POST;
            require __DIR__ . '/../Views/Students/create.php';
        }
    }

    public function edit(string $id): void
    {
        $student = Student::find($id);

        if (!$student) {
            http_response_code(404);
            echo "Data not found";
            return;
        }

        require __DIR__ . '/../Views/Students/edit.php';
    }

    public function update(string $id): void
    {
        $student = Student::find($id);

        if (!$student) {
            http_response_code(404);
            echo "Data not found";
            return;
        }

        try {
            Student::update($id, $_POST);
            $_SESSION['success'] = 'Data updated successfully';
            header('Location: /students');
            exit;
        } catch (Exception $e) {
            $errors = json_decode($e->getMessage(), true);
            $student = array_merge($student, $_POST);
            require __DIR__ . '/../Views/Students/edit.php';
        }
    }

    public function destroy(string $id): void
    {
        Student::delete($id);
        $_SESSION['success'] = 'Deleted data successfully';
        header('Location: /students');
        exit;
    }
}
