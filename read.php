<?php
$conn = mysqli_connect("localhost", "root", "", "data_siswa");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah ada parameter pencarian
if (isset($_GET['search']) && $_GET['search'] !== "") {
    $nama_yang_dicari = mysqli_real_escape_string($conn, $_GET['search']); // Sanitasi input
    $sql = "SELECT * FROM data_siswa1 WHERE nama_siswa LIKE '%$nama_yang_dicari%' ORDER BY id_siswa ASC";
} else {
    $sql = "SELECT * FROM data_siswa1 ORDER BY id_siswa ASC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Daftar Data Siswa</h2>

<!-- Form Pencarian -->
<form method="GET" action="">
    <input type="text" name="search" placeholder="Masukkan nama siswa" 
        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Cari</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tanggal Lahir</th>
        <th>Aksi</th>
    </tr>
    <?php
    $id = 1; // Inisialisasi ID agar berurutan
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $id++ . "</td>"; // Cetak ID secara manual
            echo "<td>" . htmlspecialchars($row['nama_siswa']) . "</td>";
            echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_lahir']) . "</td>";
            echo "<td><a href='update.php?id_siswa=" . $row['id_siswa'] . "'>Edit</a> | <a href='delete.php?id_siswa=" . $row['id_siswa'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data ditemukan</td></tr>";
    }
    ?>
</table>
<a href="create.php">Tambah Data</a>

<?php
// Tutup koneksi
mysqli_close($conn);
?>
</body>
</html>
