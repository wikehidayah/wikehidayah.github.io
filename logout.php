<?php
session_start();
session_destroy(); // Hapus sesi login
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout - Kebun Binatang</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            text-align: center;
            background-color: #fffbe6;
            font-family: 'Comic Sans MS', cursive;
        }
        .thankyou {
            margin-top: 100px;
        }
        .thankyou h2 {
            color: #4CAF50;
            font-size: 32px;
        }
        .thankyou p {
            font-size: 20px;
            color: #555;
        }
        .thankyou a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ffd54f;
            color: black;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="thankyou">
        <h2>🐾 Terima Kasih!</h2>
        <p>Anda telah berhasil logout dari sistem Kebun Binatang 🦁</p>
        <a href="login.php">🔑 Login Kembali</a>
    </div>
</body>
</html>

