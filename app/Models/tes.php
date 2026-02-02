<?php

require_once __DIR__ . '/../Core/Session.php';

class Student
{
    private static function init(): void
    {
        Session::start();
        $_SESSION['students'] ??= [];
    }

    public static function all(): array
    {
        self::init();
        return $_SESSION['students'] ??= [];
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
            $errors['nis'] = "NIS wajib diisi";
        } else if (!ctype_digit($data['nis'])) {
            $errors['nis'] = "NIS wajib menggunakan angka";
        } else {
            foreach ($_SESSION['students'] as $id => $student) {
                if ($student['nis'] === $data['nis'] && $id != $currentId) {
                    $errors['nis'] = "NIS Sudah terdaftar";
                    break;
                }
            }
        }

        if (empty($data['nama'])) {
            $errors['nama'] = "Nama wajib diisi";
        } else if (!preg_match('/[a-zA-Z]/', $data['nama'])) {
            $errors['nama'] = "Nama harus mengandung huruf";
        }

        $mapels = [
            'matematika' => 'Matematika',
            'bing' => 'Bahasa Inggris',
            'bin' => 'Bahasa Indonesia',
            'produktif' => 'Produktif'
        ];

        foreach ($mapels as $mapel) {
            if (!isset($data[$mapel]) || $data[$mapel] === '') {
                $errors[$mapel] = "Wajib diisi";
            } else if ($data[$mapel] < 0 || $data[$mapel] > 100) {
                $errors[$mapel] = "Rentang nlai hanya 0-100";
            }
        }

        if (!empty($errors)) {
            throw new Exception(json_encode($errors));
        }
    }

    private static function withAvarage(array $data): array
    {
        $mapels = ['matematika', 'bing', 'bin', 'produktif'];

        foreach ($mapels as $mapel) {
            $data[$mapel] = (int) ($data[$mapel] ?? 0);
        }

        $avg = ($data['matematika'] + $data['bing'] + $data['bin'] + $data['produktif']) / 4;

        $data['rata'] = $avg;
        return $data;
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
            throw new Exception("Data tidak ditemukan");
        }

        unset($_SESSION['students'][$id]);

        self::validate($data, $id);

        $data['id'] = $id;
        $_SESSION['students'][$id] = self::withAvarage($data);
    }
}
