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

    public static function avaragePerSubject(): array
    {
        self::init();
        $students = $_SESSION['students'];

        if (empty($students)) {
            return [
                'matematika' => 0,
                'bing' => 0,
                'bin' => 0,
                'produktif' => 0,
                'final' => 0,
            ];
        }

        $total = [
            'matematika' => 0,
            'bing' => 0,
            'bin' => 0,
            'produktif' => 0,
            'final' => 0,
        ];

        foreach ($students as $student) {
            $total['matematika'] += $student['matematika'];
            $total['bing'] += $student['bing'];
            $total['bin'] += $student['bin'];
            $total['produktif'] += $student['produktif'];
        }

        $count = count($students);

        $avg = [
            'matematika' => round($total['matematika'] / $count, 1),
            'bing' => round($total['bing'] / $count, 1),
            'bin' => round($total['bin'] / $count, 1),
            'produktif' => round($total['produktif'] / $count, 1),
        ];

        $avg['final'] = round((
            $avg['matematika'] +
            $avg['bing'] +
            $avg['bin'] +
            $avg['produktif']
        ) / 4, 1);

        return $avg;
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
            $errors['nis'] = "NIS Wajib Diisi";
        } else if (!ctype_digit($data['nis'])) {
            $errors['nis'] = "NIS Hanya berupa angka";
        } else {
            foreach ($_SESSION['students'] as $id => $student) {
                if ($student['nis'] === $data['nis'] && $id != $currentId) {
                    $errors['nis'] = "NIS Sudah Terdaftar";
                    break;
                }
            }
        }

        if (empty($data['nama'])) {
            $errors['nama'] = "Nama Wajib Diisi";
        } else if (!preg_match('/[a-zA-Z]/', $data['nama'])) {
            $errors['nama'] = "Nama harus mengadung huruf";
        }

        $mapels = [
            'matematika' => 'Matematika',
            'bing' => 'Bahasa Inggris',
            'bin' => 'Bahasa Indonesia',
            'produktif' => 'Produktif'
        ];

        foreach ($mapels as $mapel => $label) {
            if (!isset($data[$mapel]) || $data[$mapel] === '') {
                $errors[$mapel] = "$label Wajib Diisi";
            } else if ($data[$mapel] < 0 || $data[$mapel] > 100) {
                $errors[$mapel] = "Nilai $label hanya 0-100";
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

        $avg = (
            $data['matematika'] +
            $data['bing'] +
            $data['bin'] +
            $data['produktif']
        ) / 4;

        $data['rerata'] = $avg;
        return $data;
    }

    public static function store(array $data): void
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
            throw new Exception("Data Tidak Ditemukan");
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
            throw new Exception("Data Tidak Ditemukan");
        }

        unset($_SESSION['students'][$id]);
    }
}
