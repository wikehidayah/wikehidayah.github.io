<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "kebun_binatang");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses simpan data
if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $jumlah_pengunjung = $_POST['jumlah_pengunjung'];
    $harga_tiket = $_POST['harga_tiket'];
    $tiket_terjual = $_POST['tiket_terjual'];

    // Hitung pendapatan
    $pendapatan = $harga_tiket * $tiket_terjual;

    $query = "INSERT INTO pengunjung_harian (tanggal, jumlah_pengunjung, harga_tiket, tiket_terjual, pendapatan)
              VALUES ('$tanggal', '$jumlah_pengunjung', '$harga_tiket', '$tiket_terjual', '$pendapatan')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='pengunjung.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Pengunjung</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e8f5e9;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #2e7d32;
        }
        form {
            max-width: 500px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #388e3c;
        }
        .back {
            display: inline-block;
            margin-top: 10px;
            background: #f48fb1;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 6px;
        }
        .back:hover {
            background: #ec407a;
        }
    </style>
</head>
<body>

    <h2>➕ Tambah Data Pengunjung Kebun Binatang</h2>

    <form method="POST">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" required>

        <label for="jumlah_pengunjung">Jumlah Pengunjung</label>
        <input type="number" name="jumlah_pengunjung" required>

        <label for="harga_tiket">Harga Tiket (Rp)</label>
        <input type="number" name="harga_tiket" required>

        <label for="tiket_terjual">Tiket Terjual</label>
        <input type="number" name="tiket_terjual" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <div style="text-align: center;">
        <a href="pengunjung.php" class="back">⬅ Kembali</a>
    </div>

</body>
</html>
