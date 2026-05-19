<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "UPDATE siswa SET nama = '$nama', kelas = '$kelas' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . $conn->error;
    }
}
?>