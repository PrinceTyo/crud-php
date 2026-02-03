<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <section>
        <div class="div-first">
            <div class="div-second">
                <div class="div-third">
                    <div class="div-button">
                        <h1 class="text-button">Your Student</h1>
                        <a href="/students/create">
                            <button type="submit" class="btn">
                                Add
                            </button>
                        </a>
                    </div>

                    <div class="div-table">
                        <table>
                            <thead>
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
                            </thead>

                            <?php foreach ($students as $id => $student): ?>

                                <tr class="<?= ($student['rata'] ?? 0) < 80 ? 'red' : '' ?>">
                                    <td><?= $student['nis'] ?></td>
                                    <td><?= $student['nama'] ?? '-' ?></td>
                                    <td><?= $student['matematika'] ?? 0 ?></td>
                                    <td><?= $student['bing'] ?? 0 ?></td>
                                    <td><?= $student['bin'] ?? 0 ?></td>
                                    <td><?= $student['produktif'] ?? 0 ?></td>
                                    <td><?= $student['rata'] ?? 0 ?></td>
                                    <td>
                                        <a href="/students/<?= $id ?>/edit">Edit</a>

                                        <form action="/students/<?= $id ?>/delete" method="POST" style="display:inline">
                                            <button type="submit" onclick="return confirm('Hapus data?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>