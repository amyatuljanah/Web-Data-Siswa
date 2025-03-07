<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Siswa Kelas XI-RPL</h1>
    <form action="simpan.php" method="POST">
        <label for="nama siswa">Nama Siswa:</label><br>
        <input type="text" id="nama_siswa" name="nama_siswa" required><br><br>

        <label for="kelas">Kelas:</label><br>
        <input type="text" id="kelas" name="kelas" required><br><br>

        <label for="jurusan">Jurusan:</label><br>
        <input type="text" id="jurusan" name="jurusan" required><br><br>

        <label for="tanggal lahir">Tanggal Lahir:</label><br>
        <input type="date" id="tanggal lahir" name="tanggal lahir" required><br><br>
        <button type="submit">Simpan Data</button>
    </form>
    <br>
    <a href="read.php">Lihat Data Siswa Kelas XI-RPL</a>
</body>
</html>