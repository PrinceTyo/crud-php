<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
</head>

<body>

    <h2>Tambah Data Siswa</h2>

    <form action="/students" method="POST">
        <label>NIS</label><br>
        <input type="text" name="nis" required><br><br>

        <label>Nama</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Matematika</label><br>
        <input type="number" name="matematika" required><br><br>

        <label>Bahasa Inggris</label><br>
        <input type="number" name="bing" required><br><br>

        <label>Bahasa Indonesia</label><br>
        <input type="number" name="bin" required><br><br>

        <label>Produktif</label><br>
        <input type="number" name="produktif" required><br><br>

        <button type="submit">Simpan</button>
        <a href="/students">Kembali</a>
    </form>

</body>

</html>