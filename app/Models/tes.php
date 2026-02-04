<?php

require_once __DIR__ . '/../Models/Student.php';

class StudentController
{
    public function index(): void
    {
        $students = Student::all();
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
            header('location: /students');
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
            echo "Data Tidak Ditemukan";
            return;
        }

        require __DIR__ . '/../Views/Students/edit.php';
    }
}
