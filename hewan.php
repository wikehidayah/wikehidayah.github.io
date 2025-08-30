<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'db.php';
$data = $conn->query("SELECT * FROM hewan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Hewan - MYZOO</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial; text-align: center; background: #f1f8e9; }
        h1 { color: #2e7d32; }
        table { margin: 20px auto; border-collapse: collapse; width: 90%; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #81c784; }
        a.btn { padding: 6px 12px; background: #4caf50; color: white; text-decoration: none; border-radius: 6px; margin: 2px; display: inline-block; }
        a.delete { background: #e53935; }
        a.edit { background: #ffb300; }
        a.print { background: #41ca63ff; }
    </style>
</head>
<body>
    <h1>🦁 Data Hewan di MYZOO</h1>
    <a href="tambah_hewan.php" class="btn">+ Tambah Hewan</a>
    <a href="cetak_hewan.php" target="_blank" class="btn print">🖨️ Cetak</a>
    <table>
        <tr>
            <th>Kode</th><th>Nama</th><th>Spesies</th><th>Jenis</th><th>Umur</th><th>Kandang</th><th>Aksi</th>
        </tr>
        <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['kode_hewan'] ?></td>
            <td><?= $row['nama_hewan'] ?></td>
            <td><?= $row['spesies'] ?></td>
            <td><?= $row['jenis_hewan'] ?></td>
            <td><?= $row['umur'] ?> th</td>
            <td><?= $row['no_kandang'] ?></td>
            <td>
                <a href="edit_hewan.php?id=<?= $row['kode_hewan'] ?>" class="btn edit">✏️ Edit</a>
                <a href="hapus_hewan.php?id=<?= $row['kode_hewan'] ?>" class="btn delete" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="dashboard.php" class="btn">⬅️ Kembali ke Dashboard</a>
</body>
</html>
