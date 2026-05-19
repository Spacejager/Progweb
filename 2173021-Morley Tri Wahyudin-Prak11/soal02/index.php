<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; display: flex; justify-content: center; }
        .container { background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 25px; width: 100%; max-width: 750px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); }
        h2 { text-align: center; color: #333; margin-top: 0; margin-bottom: 20px; font-size: 26px; }
        .btn { display: inline-block; padding: 8px 16px; border-radius: 5px; text-decoration: none; color: white; font-size: 15px; border: none; cursor: pointer; text-align: center; }
        .btn-green { background-color: #4CAF50; margin-bottom: 15px; }
        .btn-blue { background-color: #2196F3; }
        .btn-red { background-color: #F44336; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #e0e0e0; font-size: 16px; }
        th { background-color: #f2f2f2; color: #333; font-weight: bold; }
        .aksi-cell { display: flex; gap: 8px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Siswa</h2>
    <a href="tambah.php" class="btn btn-green">Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;">ID</th>
                <th style="width: 45%;">Nama</th>
                <th style="width: 20%;">Kelas</th>
                <th style="width: 25%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM siswa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                    echo "<td class='aksi-cell'>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-blue' style='padding: 6px 16px;'>Edit</a>
                            <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-red' style='padding: 6px 16px;' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center; color:#999;'>Belum ada data siswa.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>