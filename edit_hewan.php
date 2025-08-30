<?php
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM hewan WHERE kode_hewan='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama_hewan'];
    $spesies = $_POST['spesies'];
    $jenis = $_POST['jenis_hewan'];
    $umur = $_POST['umur'];
    $kandang = $_POST['no_kandang'];

    $conn->query("UPDATE hewan SET 
        nama_hewan='$nama',
        spesies='$spesies',
        jenis_hewan='$jenis',
        umur='$umur',
        no_kandang='$kandang'
        WHERE kode_hewan='$id'");

    header("Location: hewan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Hewan</title>
    <style>
        body { font-family: Arial; background: #fff8e1; text-align: center; }
        form { margin: auto; width: 50%; padding: 20px; background: #fff3e0; border-radius: 10px; }
        input, select { padding: 8px; margin: 5px; width: 80%; }
        .btn { padding: 8px 15px; background: #4caf50; color: white; border: none; cursor: pointer; border-radius: 6px; }
    </style>
</head>
<body>
    <h1>✏️ Edit Data Hewan</h1>
    <form method="post">
        <input type="text" name="nama_hewan" value="<?= $data['nama_hewan'] ?>" required><br>
        <input type="text" name="spesies" value="<?= $data['spesies'] ?>" required><br>
        <input type="text" name="jenis_hewan" value="<?= $data['jenis_hewan'] ?>" required><br>
        <input type="number" name="umur" value="<?= $data['umur'] ?>" required><br>
        <input type="text" name="no_kandang" value="<?= $data['no_kandang'] ?>" required><br>
        <button type="submit" name="update" class="btn">💾 Simpan Perubahan</button>
    </form>
    <br>
    <a href="hewan.php" class="btn">⬅️ Kembali</a>
</body>
</html>
