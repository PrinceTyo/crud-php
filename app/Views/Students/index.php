<?php ob_start(); ?>

<section>
    <div class="div-first">
        <div class="div-second">
            <div class="div-third">

                <?php require __DIR__ . '/../components/alert.php'; ?>

                <div class="div-button">
                    <h1 class="text-button">Your Student</h1>
                    <div style="display: flex; gap: 10px;">
                        <a href="/students/create">
                            <button type="submit" class="btn">
                                <i class="fa-solid fa-plus"></i> Add
                            </button>
                        </a>
                        <form action="/logout" method="POST">
                            <button type="submit" class="btn">Logout</button>
                        </form>
                    </div>
                </div>

                <?php require __DIR__ . '/../components/filter.php' ?>

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

                        <?php if (empty($students)): ?>
                            <tbody>
                                <tr>
                                    <td colspan="8" style="text-align:center; padding:20px; color:gray;">
                                        Tidak ada data
                                    </td>
                                </tr>
                            </tbody>

                        <?php else: ?>

                            <?php foreach ($students as $id => $student): ?>
                                <tbody>
                                    <tr class="<?= ($student['rata'] ?? 0) < 80 ? 'red' : '' ?>">
                                        <td><?= $student['nis'] ?></td>
                                        <td><?= $student['nama'] ?? '-' ?></td>

                                        <td class="<?= ($student['matematika'] ?? 0) < 80 ? 'red' : '' ?>">
                                            <?= $student['matematika'] ?? 0 ?>
                                        </td>

                                        <td class="<?= ($student['bing'] ?? 0) < 80 ? 'red' : '' ?>">
                                            <?= $student['bing'] ?? 0 ?>
                                        </td>

                                        <td class="<?= ($student['bin'] ?? 0) < 80 ? 'red' : '' ?>">
                                            <?= $student['bin'] ?? 0 ?>
                                        </td>

                                        <td class="<?= ($student['produktif'] ?? 0) < 80 ? 'red' : '' ?>">
                                            <?= $student['produktif'] ?? 0 ?>
                                        </td>

                                        <td class="<?= ($student['rata'] ?? 0) < 80 ? 'red' : '' ?>">
                                            <?= $student['rata'] ?? 0 ?>
                                        </td>

                                        <td>
                                            <a href="/students/<?= $id ?>/edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="/students/<?= $id ?>/delete" method="POST" style="display:inline">
                                                <button type="submit" onclick="return confirm('Hapus data?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>

                            <?php endforeach; ?>

                        <?php endif; ?>

                        <tfoot>
                            <tr class="avg-row">
                                <td class="heading-rata" colspan="2">Rata-rata per Mapel</td>

                                <td>
                                    <?= $avgMapel['matematika'] ?>
                                </td>

                                <td>
                                    <?= $avgMapel['bing'] ?>
                                </td>

                                <td>
                                    <?= $avgMapel['bin'] ?>
                                </td>

                                <td>
                                    <?= $avgMapel['produktif'] ?>
                                </td>

                                <td>
                                    <?= $avgMapel['final'] ?>
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>

                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
$title = "Data Siswa";
require __DIR__ . '/../layouts/app.php';
