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
        return $_SESSION['students'];
    }

    public static function find(string $nis): ?array
    {
        self::init();
        return $_SESSION['students'][$nis] ?? null;
    }

    public static function create(array $data): void
    {
        self::init();

        // validasi NIS unik
        if (isset($_SESSION['students'][$data['nis']])) {
            throw new Exception('NIS sudah terdaftar');
        }

        $_SESSION['students'][$data['nis']] = self::withAverage($data);
    }

    public static function update(string $oldNis, array $data): void
    {
        self::init();

        unset($data['_method']);

        $newNis = $data['nis'] ?? $oldNis;

        // jika NIS berubah
        if ($newNis !== $oldNis) {

            // cek NIS baru belum dipakai
            if (isset($_SESSION['students'][$newNis])) {
                throw new Exception('NIS sudah digunakan');
            }

            // hapus data lama
            unset($_SESSION['students'][$oldNis]);
        }

        $_SESSION['students'][$newNis] = self::withAverage($data);
    }



    public static function delete(string $nis): void
    {
        self::init();

        if (isset($_SESSION['students'][$nis])) {
            unset($_SESSION['students'][$nis]);
        }
    }

    private static function withAverage(array $data): array
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
        $data['status'] = $avg < 80 ? 'TIDAK LULUS' : 'LULUS';

        return $data;
    }
}
