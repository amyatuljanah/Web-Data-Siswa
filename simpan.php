<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "data_siswa");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Simpan data ke database
$sql = "INSERT INTO data_siswa1 (nama_siswa, kelas, jurusan, tanggal_lahir) VALUES ('$nama_siswa', '$kelas', '$jurusan', '$tanggal_lahir')";
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan! <a href='read.php'>Lihat Data Siswa</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
