<?php
$conn = mysqli_connect("localhost", "root", "", "data_siswa");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil ID siswa dari parameter URL
$id_siswa = $_GET['id_siswa'];

// Query untuk menghapus data berdasarkan ID
$sql_delete = "DELETE FROM data_siswa1 WHERE id_siswa = $id_siswa";

if (mysqli_query($conn, $sql_delete)) {
    // Redirect ke halaman utama setelah berhasil menghapus
    header("Location: read.php");
    exit(); // Pastikan script berhenti di sini setelah redirect
} else {
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
