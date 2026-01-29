<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .input-error {
            border: 1px solid red;
        }

        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 4px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Tambah Data Siswa</h2>

    <form action="/students" method="POST">

        <!-- NIS -->
        <label>NIS</label><br>
        <input type="text"
            name="nis"
            value="<?= $old['nis'] ?? '' ?>"
            class="<?= isset($errors['nis']) ? 'input-error' : '' ?>"
            required>

        <?php if (isset($errors['nis'])): ?>
            <div class="error-text"><?= $errors['nis'] ?></div>
        <?php endif; ?>
        <br><br>

        <!-- Nama -->
        <label>Nama</label><br>
        <input type="text"
            name="nama"
            value="<?= $old['nama'] ?? '' ?>"
            class="<?= isset($errors['nama']) ? 'input-error' : '' ?>"
            required>

        <?php if (isset($errors['nama'])): ?>
            <div class="error-text"><?= $errors['nama'] ?></div>
        <?php endif; ?>
        <br><br>

        <!-- Matematika -->
        <label>Matematika</label><br>
        <input type="number"
            name="matematika"
            value="<?= $old['matematika'] ?? '' ?>"
            class="<?= isset($errors['matematika']) ? 'input-error' : '' ?>"
            required>

        <?php if (isset($errors['matematika'])): ?>
            <div class="error-text"><?= $errors['matematika'] ?></div>
        <?php endif; ?>
        <br><br>

        <!-- Bahasa Inggris -->
        <label>Bahasa Inggris</label><br>
        <input type="number"
            name="bing"
            value="<?= $old['bing'] ?? '' ?>"
            class="<?= isset($errors['bing']) ? 'input-error' : '' ?>"
            required>

        <?php if (isset($errors['bing'])): ?>
            <div class="error-text"><?= $errors['bing'] ?></div>
        <?php endif; ?>
        <br><br>

        <!-- Bahasa Indonesia -->
        <label>Bahasa Indonesia</label><br>
        <input type="number"
            name="bin"
            value="<?= $old['bin'] ?? '' ?>"
            class="<?= isset($errors['bin']) ? 'input-error' : '' ?>"
            required>

        <?php if (isset($errors['bin'])): ?>
            <div class="error-text"><?= $errors['bin'] ?></div>
        <?php endif; ?>
        <br><br>

        <!-- Produktif -->
        <label>Produktif</label><br>
        <input type="number"
            name="produktif"
            value="<?= $old['produktif'] ?? '' ?>"
            class="<?= isset($errors['produktif']) ? 'input-error' : '' ?>"
            required>

        <?php if (isset($errors['produktif'])): ?>
            <div class="error-text"><?= $errors['produktif'] ?></div>
        <?php endif; ?>
        <br><br>

        <button type="submit">Simpan</button>
        <a href="/students">Kembali</a>

    </form>

</body>

</html>