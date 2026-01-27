<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        tr.red {
            background-color: #f8d7da;
        }

        a,
        button {
            padding: 6px 10px;
            text-decoration: none;
            margin: 2px;
        }
    </style>
</head>

<body>

    <h2>Data Siswa</h2>

    <a href="/students/create">➕ Tambah Siswa</a>

    <table>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Matematika</th>
            <th>B.Ing</th>
            <th>B.Ind</th>
            <th>Produktif</th>
            <th>Rata-rata</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($students as $nis => $student): ?>


            <tr class="<?= ($student['rata'] ?? 0) < 80 ? 'red' : '' ?>">
                <td><?= $student['nis'] ?></td>
                <td><?= $student['nama'] ?? '-' ?></td>
                <td><?= $student['matematika'] ?? 0 ?></td>
                <td><?= $student['bing'] ?? 0 ?></td>
                <td><?= $student['bin'] ?? 0 ?></td>
                <td><?= $student['produktif'] ?? 0 ?></td>
                <td><?= $student['rata'] ?? 0 ?></td>
                <td>
                    <a href="/students/<?= $nis ?>/edit">✏️ Edit</a>

                    <form action="/students/<?= $nis ?>" method="POST" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Hapus data?')">
                            🗑️ Hapus
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>


    </table>

</body>

</html>