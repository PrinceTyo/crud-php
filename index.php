<?php include "config.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa X PPLG</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        .red {
            background: #ffcccc;
        }
    </style>
</head>

<body>

    <h2>Data Siswa X PPLG</h2>

    <a href="create.php">Tambah Data</a>
    <a href="index.php?sort=1">Urutkan Nilai</a>

    <br><br>

    <table>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>MTK</th>
            <th>B. Ing</th>
            <th>B. Indo</th>
            <th>Produktif</th>
            <th>Rerata</th>
            <th>Aksi</th>
        </tr>

        <?php
        // SORT
        if (isset($_GET['sort'])) {
            usort($_SESSION['siswa'], fn($a, $b) => $a['rerata'] <=> $b['rerata']);
        }

        foreach ($_SESSION['siswa'] as $i => $s): ?>
            <tr class="<?= ($s['rerata'] < $kkm) ? 'red' : '' ?>">
                <td><?= $s['nis'] ?></td>
                <td><?= $s['nama'] ?></td>
                <td><?= $s['mtk'] ?></td>
                <td><?= $s['bing'] ?></td>
                <td><?= $s['bin'] ?></td>
                <td><?= $s['prod'] ?></td>
                <td><?= number_format($s['rerata'], 2) ?></td>
                <td>
                    <a href="edit.php?id=<?= $i ?>">✏️ Edit</a>
                    <a href="delete.php?id=<?= $i ?>" onclick="return confirm('Hapus data?')">🗑 Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>