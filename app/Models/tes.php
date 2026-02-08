<?php

require_once __DIR__ . '/../Core/Session.php';

class Student
{
    public static function filter(array $params): array
    {
        $students = self::all();

        if (!empty($params['nis'])) {
            $nis = $params['nis'];
            $students = array_filter($students, fn($s) => str_contains($s['nis'], $nis));
        }

        if (!empty($params['nis'])) {
            if ($params['nis'] === 'asc') {
                uasort($students, fn($a, $b) => $a['nis'] <=> $b['nis']);
            }

            if ($params['nis'] === 'desc') {
                uasort($students, fn($a, $b) => $b['nis'] <=> $a['nis']);
            }
        }

        return $students;
    }
}
