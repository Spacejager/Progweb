<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proses Login</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif; margin: 20px; font-size: 28px;">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form index.html
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate jika username dan password adalah "admin"
    if ($username === 'admin' && $password === 'admin') {
        ?>
        <h1 style="font-size: 36px; margin-bottom: 10px; font-weight: bold;">Login berhasil!</h1>
        <p style="margin-top: 0; margin-bottom: 20px;">
            Selamat datang, <span style="color: blue; font-weight: bold;">admin</span>.
        </p>
        <?php
    } else {
        ?>
        <p style="margin-bottom: 20px; font-weight: bold;">
            <span style="color: red;">Username : </span>
            <span style="color: black;"><?php echo htmlspecialchars($username); ?></span>
            <span style="color: red;"> Tidak Terdaftar!</span>
        </p>
        <?php
    }
} else {
    // Jika diakses langsung tanpa login, line ini dibalikin ke index
    header("Location: index.html");
    exit();
}
?>

    <a href="index.html" style="color: #4c1d95; font-size: 24px; text-decoration: underline;">kembali ke halaman login</a>

</body>
</html>