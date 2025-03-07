<?php
$conn = mysqli_connect("localhost", "root", "", "data_siswa");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_GET['id_siswa'];
$query = "SELECT * FROM data_siswa1 WHERE id_siswa = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Edit Data Siswa</h1>
<form action="" method="POST">
    <label>Nama Siswa:</label>
    <input type="text" name="nama_siswa" value="<?= htmlspecialchars($data['nama_siswa']) ?>" required><br>
    <label>Kelas:</label>
    <input type="text" name="kelas" value="<?= htmlspecialchars($data['kelas']) ?>" required><br>
    <label>Jurusan:</label>
    <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']) ?>" required><br>
    <label>Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($data['tanggal_lahir']) ?>" required><br>
    <button type="submit" name="submit">Update</button>
</form>
<a href="read.php">Kembali</a>

<?php
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_siswa']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
    
    $query = "UPDATE data_siswa1 
              SET nama_siswa = '$nama', kelas = '$kelas', jurusan = '$jurusan', tanggal_lahir = '$tanggal' 
              WHERE id_siswa = $id";

    if ($conn->query($query)) {
        header("Location: read.php?status=success"); // Redirect ke read.php dengan notifikasi
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

mysqli_close($conn);
?>
</body>
</html>
