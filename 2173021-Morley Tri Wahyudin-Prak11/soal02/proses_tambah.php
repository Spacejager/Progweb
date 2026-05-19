<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST['nama'];
    $kelas = $_POST['kelas'];

    
    $sql = "INSERT INTO siswa (nama, kelas) VALUES ('$nama', '$kelas')";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>