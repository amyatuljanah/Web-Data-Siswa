<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "data_siswa");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses penyimpanan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Query untuk menyimpan data
    $query = "INSERT INTO data_siswa1 (nama_siswa, kelas, jurusan, tanggal_lahir) VALUES ('$nama_siswa', '$kelas', '$jurusan', '$tanggal_lahir')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?message=Data berhasil disimpan!");
        exit();
    } else {
        header("Location: index.php?message=Data gagal disimpan!");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Data Siswa</h1>
    <form action="simpan.php" method="POST">
        <label for="nama siswa">Nama Siswa:</label><br>
        <input type="text" id="nama siswa" name="nama siswa" required><br><br>

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

<?php
// Tutup koneksi
mysqli_close($conn);
?>