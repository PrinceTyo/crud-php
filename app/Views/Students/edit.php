<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
</head>

<body>

    <h2>Edit Data Siswa</h2>

    <form action="/students/<?= $nis ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">

        <label>NIS</label><br>
        <input type="text" name="nis" value="<?= $student['nis'] ?>"><br><br>

        <label>Nama</label><br>
        <input type="text" name="nama" value="<?= $student['nama'] ?>" required><br><br>

        <label>Matematika</label><br>
        <input type="number" name="matematika" value="<?= $student['matematika'] ?>" required><br><br>

        <label>Bahasa Inggris</label><br>
        <input type="number" name="bing" value="<?= $student['bing'] ?>" required><br><br>

        <label>Bahasa Indonesia</label><br>
        <input type="number" name="bin" value="<?= $student['bin'] ?>" required><br><br>

        <label>Produktif</label><br>
        <input type="number" name="produktif" value="<?= $student['produktif'] ?>" required><br><br>

        <button type="submit">Update</button>
        <a href="/students">Batal</a>
    </form>

</body>

</html>