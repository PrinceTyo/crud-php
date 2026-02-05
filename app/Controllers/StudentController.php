<?php

require_once __DIR__ . '/../Models/Student.php';

class StudentController
{
    public function index(): void
    {
        $students = Student::all();
        $avgMapel = Student::averagePerSubject();
        if (!empty($_GET['nis'])) {
            $nis = $_GET['nis'];
            $students = array_filter($students, function ($student) use ($nis) {
                return str_contains($student['nis'], $nis);
            });
        }

        if (!empty($_GET['sort'])) {
            if ($_GET['sort'] === 'asc') {
                uasort($students, fn($a, $b) => $a['nis'] <=> $b['nis']);
            }
            if ($_GET['sort'] === 'desc') {
                uasort($students, fn($a, $b) => $b['nis'] <=> $a['nis']);
            }
        }
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
            $_SESSION['success'] = 'Created data successfully';
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
            echo "Data not found";
            return;
        }

        require __DIR__ . '/../Views/students/edit.php';
    }

    public function update(string $id): void
    {
        $student = Student::find($id);

        if (!$student) {
            die('Data not found');
        }

        try {
            Student::update($id, $_POST);
            $_SESSION['success'] = 'Data updated successfully';
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
        $_SESSION['success'] = 'Deleted data successfully';
        header('Location: /students');
        exit;
    }
}
