<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>

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

    <h2>Edit Data Siswa</h2>

    <form action="/students/<?= $student['id'] ?>/update" method="POST">

        <!-- NIS -->
        <label>NIS</label><br>
        <input type="text"
            name="nis"
            value="<?= $student['nis'] ?? '' ?>"
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
            value="<?= $student['nama'] ?? '' ?>"
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
            value="<?= $student['matematika'] ?? '' ?>"
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
            value="<?= $student['bing'] ?? '' ?>"
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
            value="<?= $student['bin'] ?? '' ?>"
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
            value="<?= $student['produktif'] ?? '' ?>"
            class="<?= isset($errors['produktif']) ? 'input-error' : '' ?>"
            required>

        <?php if (isset($errors['produktif'])): ?>
            <div class="error-text"><?= $errors['produktif'] ?></div>
        <?php endif; ?>
        <br><br>

        <button type="submit">Update</button>
        <a href="/students">Batal</a>

    </form>

</body>

</html>