<?php
$conn = new mysqli("localhost", "root", "", "kebun_binatang");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
