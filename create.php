<?php include "config.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $mtk = $_POST['mtk'];
    $bing = $_POST['bing'];
    $bin = $_POST['bin'];
    $prod = $_POST['prod'];

    foreach ($_SESSION['siswa'] as $s) {
        if ($s['nis'] == $nis) {
            $error = "NIS sudah ada!";
        }
    }

    if ($error == "") {
        $rerata = ($mtk + $bing + $bin + $prod) / 4;

        $_SESSION['siswa'][] = [
            'nis' => $nis,
            'nama' => $nama,
            'mtk' => $mtk,
            'bing' => $bing,
            'bin' => $bin,
            'prod' => $prod,
            'rerata' => $rerata
        ];

        header("Location: index.php");
        exit;
    }
}
?>

<h2>Tambah Data Siswa</h2>

<p style="color:red"><?= $error ?></p>

<form method="post">
    NIS <input name="nis"><br>
    Nama <input name="nama"><br>
    MTK <input type="number" name="mtk"><br>
    B. Ing <input type="number" name="bing"><br>
    B. Indo <input type="number" name="bin"><br>
    Produktif <input type="number" name="prod"><br><br>

    <button>Simpan</button>
    <a href="index.php">Kembali</a>
</form>