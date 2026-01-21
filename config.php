<?php
session_start();

if (!isset($_SESSION['siswa'])) {
    $_SESSION['siswa'] = [];
}

$kkm = 80;
