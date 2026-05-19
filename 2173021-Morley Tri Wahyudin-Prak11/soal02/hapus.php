<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '') {
    $sql = "DELETE FROM siswa WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>