<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM hewan WHERE kode_hewan='$id'");
header("Location: hewan.php");
?>
