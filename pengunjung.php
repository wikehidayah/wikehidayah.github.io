<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "kebun_binatang");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari tabel pengunjung_harian
$query = "SELECT * FROM pengunjung_harian ORDER BY tanggal DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengunjung Kebun Binatang</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff8e1;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #ffe082;
            color: #333;
        }
        tr:hover {
            background-color: #f9fbe7;
        }
        .btn {
            display: inline-block;
            padding: 8px 14px;
            margin: 5px;
            font-size: 14px;
            background-color: #81c784;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        .btn:hover {
            background-color: #66bb6a;
        }
        .btn-edit {
            background-color: #ffb300;
        }
        .btn-delete {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <h2>🐯 Data Pengunjung Harian Kebun Binatang 🦓</h2>

    <div style="text-align: center;">
        <a href="tambah_pengunjung.php" class="btn">➕ Tambah Data</a>
        <a href="#" onclick="window.print();" class="btn">🖨️ Cetak</a>
        <a href="dashboard.php" class="btn" style="background-color: #f48fb1;">🏠 Kembali</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah Pengunjung</th>
                <th>Harga Tiket (Rp)</th>
                <th>Tiket Terjual</th>
                <th>Pendapatan (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['jumlah_pengunjung']}</td>
                    <td>" . number_format($row['harga_tiket'], 0, ',', '.') . "</td>
                    <td>{$row['tiket_terjual']}</td>
                    <td>" . number_format($row['pendapatan'], 0, ',', '.') . "</td>
                    <td>
                        <a href='edit_pengunjung.php?id={$row['id']}' class='btn btn-edit'>✏️ Edit</a>
                        <a href='hapus_pengunjung.php?id={$row['id']}' class='btn btn-delete' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">🗑️ Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>
</html>
