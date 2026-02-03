<?php

require_once __DIR__ . '/../Models/Student.php';

class StudentController
{
    public function index(): void
    {
        $students = Student::all();
        require __DIR__ . '/../Views/students/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../Views/students/create.php';
    }

    public function store(): void
    {
        try {
            Student::store($_POST);
            header('Location: /students');
            exit;
        } catch (Exception $e) {
            $errors = json_decode($e->getMessage(), true);
            $old = $_POST;
            require __DIR__ . '/../Views/students/create.php';
        }
    }

    public function edit(string $id): void
    {
        $student = Student::find($id);

        if (!$student) {
            http_response_code(404);
            echo "Siswa tidak ditemukan";
            return;
        }

        require __DIR__ . '/../Views/students/edit.php';
    }

    public function update(string $id): void
    {
        $student = Student::find($id);

        if (!$student) {
            die('Data tidak ditemukan');
        }

        try {
            Student::update($id, $_POST);
            header('Location: /students');
            exit;
        } catch (Exception $e) {
            $errors = json_decode($e->getMessage(), true);
            $student = array_merge($student, $_POST);
            require __DIR__ . '/../Views/students/edit.php';
        }
    }

    public function destroy(string $id): void
    {
        Student::delete($id);
        header('Location: /students');
        exit;
    }
}
