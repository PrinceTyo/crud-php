<?php include "config.php";

$id = $_GET['id'];
$s = $_SESSION['siswa'][$id];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mtk = $_POST['mtk'];
    $bing = $_POST['bing'];
    $bin = $_POST['bin'];
    $prod = $_POST['prod'];

    $rerata = ($mtk + $bing + $bin + $prod) / 4;

    $_SESSION['siswa'][$id] = [
        'nis' => $s['nis'],
        'nama' => $_POST['nama'],
        'mtk' => $mtk,
        'bing' => $bing,
        'bin' => $bin,
        'prod' => $prod,
        'rerata' => $rerata
    ];

    header("Location: index.php");
}
?>

<h2>Edit Data</h2>

<form method="post">
    NIS <input value="<?= $s['nis'] ?>" disabled><br>
    Nama <input name="nama" value="<?= $s['nama'] ?>"><br>
    MTK <input name="mtk" value="<?= $s['mtk'] ?>"><br>
    B. Ing <input name="bing" value="<?= $s['bing'] ?>"><br>
    B. Indo <input name="bin" value="<?= $s['bin'] ?>"><br>
    Produktif <input name="prod" value="<?= $s['prod'] ?>"><br><br>

    <button>Update</button>
    <a href="index.php">Kembali</a>
</form>