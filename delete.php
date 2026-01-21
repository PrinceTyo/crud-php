<?php
include "config.php";

$id=$_GET['id'];

unset($_SESSION['siswa'][$id]);
$_SESSION['siswa']=array_values($_SESSION['siswa']);

header("Location: index.php");
