<?php
$koneksi = mysqli_connect("localhost", "root", "", "kebun_binatang");

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pengunjung_harian WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah_pengunjung'];
    $harga = $_POST['harga_tiket'];
    $tiket = $_POST['tiket_terjual'];
    $pendapatan = $_POST['pendapatan'];

    mysqli_query($koneksi, "UPDATE pengunjung_harian SET 
        tanggal='$tanggal',
        jumlah_pengunjung='$jumlah',
        harga_tiket='$harga',
        tiket_terjual='$tiket',
        pendapatan='$pendapatan'
        WHERE id=$id
    ");

    header("Location: pengunjung.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Pengunjung</title></head>
<body>
    <h2>Edit Data Pengunjung</h2>
    <form method="post">
        Tanggal: <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>"><br><br>
        Jumlah Pengunjung: <input type="number" name="jumlah_pengunjung" value="<?= $row['jumlah_pengunjung'] ?>"><br><br>
        Harga Tiket: <input type="number" name="harga_tiket" value="<?= $row['harga_tiket'] ?>"><br><br>
        Tiket Terjual: <input type="number" name="tiket_terjual" value="<?= $row['tiket_terjual'] ?>"><br><br>
        Pendapatan: <input type="number" name="pendapatan" value="<?= $row['pendapatan'] ?>"><br><br>
        <button type="submit" name="simpan">Simpan Perubahan</button>
    </form>
</body>
</html>
