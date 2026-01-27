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
            Student::create($_POST);
            header('Location: /students');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit;
    }

    public function edit(string $nis): void
    {
        $student = Student::find($nis);

        if (!$student) {
            http_response_code(404);
            echo "Siswa tidak ditemukan";
            return;
        }

        require __DIR__ . '/../Views/students/edit.php';
    }

    public function update(string $nis): void
    {
        try {
            Student::update($nis, $_POST);
            header('Location: /students');
            exit;
        } catch (Exception $e) {

            $student = array_merge(
                Student::find($nis),
                $_POST
            );

            $error = $e->getMessage();
            require __DIR__ . '/../Views/students/edit.php';
        }
    }



    public function destroy(string $nis): void
    {
        Student::delete($nis);
        header('Location: /students');
        exit;
    }
}
