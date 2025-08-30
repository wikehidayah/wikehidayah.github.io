<?php
$koneksi = mysqli_connect("localhost", "root", "", "kebun_binatang");

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pengunjung_harian WHERE id=$id");

header("Location: pengunjung.php");
?>
