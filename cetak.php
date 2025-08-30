<?php
include 'db.php';
$data = $conn->query("SELECT * FROM hewan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Hewan</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        @media print {
            button { display: none; }
        }
    </style>
</head>
<body>
    <h2>🦁 Data Hewan Kebun Binatang</h2>
    <button onclick="window.print()">Cetak</button>
    <table>
        <tr><th>Kode</th><th>Nama</th><th>Spesies</th><th>Jenis</th><th>Umur</th><th>Kandang</th></tr>
        <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['kode_hewan'] ?></td>
            <td><?= $row['nama_hewan'] ?></td>
            <td><?= $row['spesies'] ?></td>
            <td><?= $row['jenis_hewan'] ?></td>
            <td><?= $row['umur'] ?></td>
            <td><?= $row['no_kandang'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
