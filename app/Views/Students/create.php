<?php ob_start(); ?>

<div class="form-container">
    <div>
        <form action="/students" method="POST" class="form-card">
            <h2 class="page-title">Tambah Data Siswa</h2>

            <div class="div-top">
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis"
                        value="<?= $old['nis'] ?? '' ?>"
                        class="<?= isset($errors['nis']) ? 'input-error' : '' ?>">

                    <?php if (isset($errors['nis'])): ?>
                        <div class="error-text"><?= $errors['nis'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama"
                        value="<?= $old['nama'] ?? '' ?>"
                        class="<?= isset($errors['nama']) ? 'input-error' : '' ?>">

                    <?php if (isset($errors['nama'])): ?>
                        <div class="error-text"><?= $errors['nama'] ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="div-bottom">
                <div class="form-group">
                    <label>Matematika</label>
                    <input type="number" name="matematika"
                        value="<?= $old['matematika'] ?? '' ?>"
                        class="<?= isset($errors['matematika']) ? 'input-error' : '' ?>">

                    <?php if (isset($errors['matematika'])): ?>
                        <div class="error-text"><?= $errors['matematika'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Bahasa Inggris</label>
                    <input type="number" name="bing"
                        value="<?= $old['bing'] ?? '' ?>"
                        class="<?= isset($errors['bing']) ? 'input-error' : '' ?>">

                    <?php if (isset($errors['bing'])): ?>
                        <div class="error-text"><?= $errors['bing'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Bahasa Indonesia</label>
                    <input type="number" name="bin"
                        value="<?= $old['bin'] ?? '' ?>"
                        class="<?= isset($errors['bin']) ? 'input-error' : '' ?>">

                    <?php if (isset($errors['bin'])): ?>
                        <div class="error-text"><?= $errors['bin'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Produktif</label>
                    <input type="number" name="produktif"
                        value="<?= $old['produktif'] ?? '' ?>"
                        class="<?= isset($errors['produktif']) ? 'input-error' : '' ?>">

                    <?php if (isset($errors['produktif'])): ?>
                        <div class="error-text"><?= $errors['produktif'] ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-actions">
                <button class="btn-primary">Simpan</button>
                <a href="/students" class="btn-secondary">Kembali</a>
            </div>

        </form>

    </div>
</div>
<?php
$content = ob_get_clean();
$title = "Tambah Siswa";
require __DIR__ . '/../layouts/app.php';
