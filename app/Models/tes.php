<?php

require_once __DIR__ . '/../Core/Session.php';

class Student
{
    private static function init(): void
    {
        Session::start();
        $_SESSION['students'] ??= [];
        $_SESSION['auto_id'] ??= 1;
    }

    public static function all(): array
    {
        self::init();
        return $_SESSION['students'];
    }

    public static function find(string $id): ?array
    {
        self::init();
        return $_SESSION['students'][$id] ?? null;
    }

    private static function validate(array $data, ?string $currentId = null): void
    {
        $errors = [];

        if (empty($data['nis'])) {
            $errors['nis'] = 'NIS wajib diisi';
        } else if (!ctype_digit($data['nis'])) {
            $errors['nis'] = 'NIS wajib berupa angka';
        } else {
            foreach ($_SESSION['students'] as $id => $student) {
                if ($student['nis'] === $data['nis'] && $id != $currentId) {
                    $errors['nis'] = 'NIS sudah terdaftar';
                    break;
                }
            }
        }

        if (empty($data['nama'])) {
            $errors['nama'] = 'Nama wajib diisi';
        } else if (!preg_match('/[a-zA-Z]/', $data['nama'])) {
            $errors['nama'] = 'Nama harus mengandung huruf';
        }

        $scores = [
            'matematika' => 'Matematika',
            'bing' => 'Bahasa Inggris',
            'bin' => 'Bahasa Indonesia',
            'produktif' => 'Produktif',
        ];

        foreach ($scores as $field) {
            if (!isset($data[$field]) || $data[$field] === '') {
                $errors[$field] = "Nilai wajib diisi";
            } else if ($data[$field] < 0 || $data[$field] > 100) {
                $errors[$field] = "Rentang nilai hanya 0-100";
            }
        }

        if (!empty($errors)) {
            throw new Exception(json_encode($errors));
        }
    }

    public static function create(array $data): void
    {
        self::init();
        self::validate($data);

        $id = $_SESSION['auto_id']++;

        $data['id'] = $id;
        $_SESSION['students'][$id] = self::withAvarage($data);
    }

    public static function update(string $id, array $data): void
    {
        self::init();

        if (!isset($_SESSION['students'][$id])) {
            throw new Exception('Data tidak ditemukan');
        }

        unset($_SESSION['students'][$id]);

        self::validate($data, $id);

        $data['id'] = $id;
        $_SESSION['students'][$id] = self::withAvarage($data);
    }

    public static function delete(string $id): void
    {
        self::init();

        if (!isset($_SESSION['students'][$id])) {
            throw new Exception('Data tidak ditemukan');
        }

        unset($_SESSION['students'][$id]);
    }

    private static function withAvarage(array $data): array
    {
        $fields = ['matematika', 'bing', 'bin', 'produktif'];

        foreach ($fields as $field) {
            $data[$field] = (int) ($data[$field] ?? 0);
        }

        $avg = (
            $data['matematika'] +
            $data['bing'] +
            $data['bin'] +
            $data['produktif']
        ) / 4;

        $data['rata'] = $avg;

        return $data;
    }
}
