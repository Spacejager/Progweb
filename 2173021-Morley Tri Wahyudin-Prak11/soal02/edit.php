<?php
include 'koneksi.php';

// ambil ID dari parameter (?id=...)
$id = isset($_GET['id']) ? $_GET['id'] : '';
$nama = '';
$kelas = '';

if ($id != '') {
    $sql = "SELECT * FROM siswa WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $kelas = $row['kelas'];
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; display: flex; justify-content: center; }
        .container { background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 25px; width: 100%; max-width: 750px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); }
        h2 { text-align: center; color: #333; margin-top: 0; margin-bottom: 25px; font-size: 26px; }
        label { display: block; margin-bottom: 8px; font-size: 16px; color: #333; }
        input[type="text"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-bottom: 20px; font-size: 15px; }
        .btn { display: block; padding: 10px 20px; border-radius: 5px; text-decoration: none; color: white; font-size: 15px; border: none; cursor: pointer; text-align: center; width: max-content; }
        .btn-green { background-color: #4CAF50; margin-bottom: 15px; }
        .btn-blue { background-color: #2196F3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Siswa</h2>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>

        <label>Kelas:</label>
        <input type="text" name="kelas" value="<?php echo htmlspecialchars($kelas); ?>" required>

        <button type="submit" class="btn btn-green">Update</button>
        <a href="index.php" class="btn btn-blue">Kembali</a>
    </form>
</div>

</body>
</html>