<?php
session_start();
if (!isset($_SESSION['login'])) header("Location: login.php");
include 'db.php';

if ($_POST) {
    $stmt = $conn->prepare("INSERT INTO hewan VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $_POST['kode'], $_POST['nama'], $_POST['spesies'], $_POST['jenis'], $_POST['umur'], $_POST['kandang']);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Hewan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Hewan</h2>
    <form method="post">
        <input name="kode" placeholder="Kode Hewan" required><br>
        <input name="nama" placeholder="Nama Hewan" required><br>
        <input name="spesies" placeholder="Spesies" required><br>
        <input name="jenis" placeholder="Jenis Hewan" required><br>
        <input name="umur" type="number" placeholder="Umur" required><br>
        <input name="kandang" placeholder="No Kandang" required><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="dashboard.php">⬅️ Kembali</a>
</body>
</html>
